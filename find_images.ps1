$html = Get-Content -Path 'd:\xampp\htdocs\totaltech\midflorida\cuemath_page.html' -Raw
$pattern = 'https://[^\s"'']+\.(?:webp|png|jpg|jpeg|svg|mp4)'
$matches = [regex]::Matches($html, $pattern)
$results = @()
foreach ($m in $matches) {
    $results += $m.Value
}
$results = $results | Select-Object -Unique
Write-Host "Total unique URLs: " $results.Count
$results | Set-Content -Path 'd:\xampp\htdocs\totaltech\midflorida\all_cuemath_urls.txt'
$results
