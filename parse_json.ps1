$dir = Split-Path -Parent $MyInvocation.MyCommand.Path
$json = Get-Content -Path (Join-Path $dir 'next_data.json') -Raw
$matches = [regex]::Matches($json, '"(https?:\\/\\/[^"]+)"')
$list = @()
foreach ($m in $matches) {
    $u = $m.Groups[1].Value -replace '\\/', '/'
    if ($u -match '\.(png|jpg|jpeg|webp|svg|mp4)') {
        $list += $u
    }
}
$list = $list | Select-Object -Unique
$list | Set-Content (Join-Path $dir 'cuemath_assets.txt')
Write-Host "Total assets found:" $list.Count
$list | Select-Object -First 30
