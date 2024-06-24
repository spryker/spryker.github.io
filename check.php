<?php
$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('docs'));
$files = array();

/** @var SplFileInfo $file */
foreach ($rii as $file) {
    if ($file->isDir()) {
        continue;
    }

    checkFile($file->getPathname());
}

//checkFile('docs/scos/dev/troubleshooting/troubleshooting-docker-issues/troubleshooting-running-applications-in-docker/413-request-entity-too-large.md');

function checkFile(string $file): void
{
    if (!isPageFile($file)) {
//        print $file . ' is not a page file.' . PHP_EOL;

        return;
    }

    if (processFile($file)) {
//        print $file . ' was updated' . PHP_EOL;
    }
}

function isPageFile(string $file): bool
{
    $fileContents = file_get_contents($file);

    return preg_match('/^---\ntitle:.*?template:.*?---/s', $fileContents);
}

function processFile(string $file): bool
{
    print $file . ' ';

    $changes = getHistory($file);

//    var_dump($changes);

    $fileContents = file_get_contents($file);

    $currentLastUpdatedTimestamp = getLastUpdated($fileContents);

//    var_dump($currentLastUpdatedTimestamp);
    if ($currentLastUpdatedTimestamp !== 0 && count($changes) === 1) {
        print 'SKIP: Too short history.' . PHP_EOL;

        return false;
    }

    $latestChangeDate = array_keys($changes)[0];
    if ($latestChangeDate === $currentLastUpdatedTimestamp) {
        print 'SKIP: date matches.' . PHP_EOL;

        return false;
    }

    $newDate = date('M j, Y', $latestChangeDate);
    $newLastUpdated = sprintf('last_updated: %s', $newDate);

    if (!$currentLastUpdatedTimestamp) {
        print 'ADD : added last updated date.' . PHP_EOL;

        file_put_contents(
            $file,
            preg_replace('/template: [^\\n]*/', "$0\n" . $newLastUpdated, $fileContents)
        );

    }
    return true;

    print 'UPD : updated last updated date.' . PHP_EOL;

    file_put_contents(
        $file,
        preg_replace('/last_updated: ([^\\n]*)/', $newLastUpdated, $fileContents)
    );

    return true;
}

function getHistory(string $filename): array
{
    $separator = '|||';
    ob_start();
    passthru(sprintf('git --no-pager log --max-count=5 --format="%%H'.$separator.'%%at'.$separator.'%%s" %s', $filename));
    $historyRaw = ob_get_contents();
    ob_end_clean();

    $history = [];
    foreach (explode("\n", $historyRaw) as $line) {
        if (empty($line)) continue;
        list($hash, $timestamp) = explode($separator, $line);
        if (empty($hash)) continue;
        $timestamp = (int)($timestamp / 24 / 60 / 60) * 24 * 60 * 60;
        $history[$timestamp] = $hash;
    }

    return $history;
}

function getLastUpdated(string $data): int
{
    preg_match('/last_updated: ([^\\n]*)/', $data, $matches);

    if (empty($matches)) return 0;

    return $matches[1] ? strtotime($matches[1]) : 0;
}
