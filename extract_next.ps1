$dir = Split-Path -Parent $MyInvocation.MyCommand.Path
$html = Get-Content -Path (Join-Path $dir 'cuemath_page.html') -Raw
if ($html -match '<script id="__NEXT_DATA__"[^>]*>(.*?)</script>') {
    $json = $matches[1]
    $json | Set-Content -Path (Join-Path $dir 'next_data.json')
    $urls = [regex]::Matches($json, 'https?://[^\s"''\\]+\.(?:png|jpg|jpeg|webp|mp4|svg)')
    $urls | ForEach-Object { $_.Value } | Select-Object -Unique | Set-Content -Path (Join-Path $dir 'extracted_next_urls.txt')
    Write-Host "Found NEXT DATA and extracted" (Get-Content -Path (Join-Path $dir 'extracted_next_urls.txt')).Count "URLs"
} else {
    Write-Host "No __NEXT_DATA__ found"
}
