<?php
/**
 * includes/helpers.php
 * Funções pequenas e reutilizáveis usadas pelas seções.
 * Requer PHP 8.0 ou superior.
 */

declare(strict_types=1);

/**
 * Escapa texto para uso seguro em HTML (evita XSS).
 * Use SEMPRE que imprimir um dado vindo de data/portfolio.php.
 */
function e(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Inclui um arquivo .php (sem a extensão) da raiz do projeto, expondo
 * apenas as variáveis recebidas em $vars.
 *
 * Exemplo: partial('sections/about', ['portfolio' => $portfolio]);
 */
function partial(string $name, array $vars = []): void
{
    $file = dirname(__DIR__) . '/' . $name . '.php';

    if (!is_file($file)) {
        throw new RuntimeException("Arquivo não encontrado: {$name}.php");
    }

    // Função anônima isola as variáveis do arquivo incluído.
    (static function (string $__file, array $__vars): void {
        extract($__vars, EXTR_SKIP);
        require $__file;
    })($file, $vars);
}

/**
 * Calcula "há quanto tempo" entre duas datas, em português.
 * Se $end for null, usa a data de hoje.
 *
 * Exemplo: format_duration('2025-11-01') => "11 meses"
 */
function format_duration(string $start, ?string $end = null): string
{
    $from = new DateTimeImmutable($start);
    $to   = $end !== null ? new DateTimeImmutable($end) : new DateTimeImmutable('now');
    $diff = $from->diff($to);

    $months = $diff->y * 12 + $diff->m;

    if ($months < 1) {
        return 'menos de 1 mês';
    }

    $years = intdiv($months, 12);
    $rest  = $months % 12;
    $parts = [];

    if ($years > 0) {
        $parts[] = $years . ($years === 1 ? ' ano' : ' anos');
    }
    if ($rest > 0) {
        $parts[] = $rest . ($rest === 1 ? ' mês' : ' meses');
    }

    return implode(' e ', $parts);
}

/**
 * Transforma um array em JSON indentado e devolve uma lista de linhas já
 * com HTML de destaque de sintaxe (chaves, textos e valores literais).
 * Usado pelo cartão de "resposta da API" no hero.
 *
 * O texto é escapado ANTES de receber as tags <span>, então o retorno é
 * seguro para imprimir sem e().
 *
 * @return string[]
 */
function json_preview_lines(array $data): array
{
    $json = json_encode(
        $data,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
    );

    // json_encode usa 4 espaços; 2 deixam o cartão mais compacto.
    $json = preg_replace_callback(
        '/^( +)/m',
        static fn (array $m): string => str_repeat(' ', intdiv(strlen($m[1]), 2)),
        $json
    );

    $lines = [];

    foreach (explode("\n", $json) as $line) {
        $safe = htmlspecialchars($line, ENT_NOQUOTES, 'UTF-8');

        // "chave":
        $safe = preg_replace('/^(\s*)"([^"]+)":/', '$1<span class="tok-key">"$2"</span>:', $safe);
        // "texto" (valor ou item de lista), com vírgula opcional no fim da linha
        $safe = preg_replace('/("(?:[^"\\\\]|\\\\.)*")(,?)$/', '<span class="tok-str">$1</span>$2', $safe);
        // true, false, null e números
        $safe = preg_replace('/(:\s|^\s+)(true|false|null|-?\d+(?:\.\d+)?)(,?)$/', '$1<span class="tok-lit">$2</span>$3', $safe);

        $lines[] = $safe;
    }

    return $lines;
}
