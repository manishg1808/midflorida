$dir = Split-Path -Parent $MyInvocation.MyCommand.Path
$html = Get-Content -Path (Join-Path $dir 'cuemath_page.html') -Raw
$matches = [regex]::Matches($html, 'https://[^\s"''\)]+\.(?:png|jpg|jpeg|webp|mp4|svg)')
$matches | ForEach-Object { $_.Value } | Select-Object -Unique | Set-Content -Path (Join-Path $dir 'extracted_urls.txt')
Write-Host "Extracted URLs count:" (Get-Content -Path (Join-Path $dir 'extracted_urls.txt')).Count

