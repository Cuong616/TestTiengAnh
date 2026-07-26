# ============================================================
#  TiengAnh -- Server Launcher
#  Khoi dong MySQL + Laravel dev server + mo trinh duyet
# ============================================================

$Host.UI.RawUI.WindowTitle = "TiengAnh Server"
$ProjectDir = $PSScriptRoot
$Port       = 8000
$URL        = "http://127.0.0.1:$Port"
$MySQLSvc   = "MySQL80"

# -- Helper functions ----------------------------------------
function Write-Banner {
    Clear-Host
    Write-Host ""
    Write-Host "  +==========================================+" -ForegroundColor DarkMagenta
    Write-Host "  |                                          |" -ForegroundColor DarkMagenta
    Write-Host "  |   TIENGANH -- Server Launcher            |" -ForegroundColor Magenta
    Write-Host "  |                                          |" -ForegroundColor DarkMagenta
    Write-Host "  +==========================================+" -ForegroundColor DarkMagenta
    Write-Host ""
}

function Write-Step { param($msg) Write-Host "  >> $msg" -ForegroundColor Cyan    }
function Write-OK   { param($msg) Write-Host "  OK $msg" -ForegroundColor Green   }
function Write-Warn { param($msg) Write-Host "  !! $msg" -ForegroundColor Yellow  }
function Write-Fail { param($msg) Write-Host "  XX $msg" -ForegroundColor Red     }
function Write-Info { param($msg) Write-Host "     $msg" -ForegroundColor Gray     }
function Write-Sep  { Write-Host "  ------------------------------------------" -ForegroundColor DarkGray }

# ============================================================
Write-Banner

# -- BUOC 1: Kiem tra va khoi dong MySQL ---------------------
Write-Step "Kiem tra MySQL ($MySQLSvc)..."

$svc = Get-Service -Name $MySQLSvc -ErrorAction SilentlyContinue

if ($null -eq $svc) {
    Write-Fail "Khong tim thay service '$MySQLSvc'."
    Write-Info "Cac MySQL service hien co:"
    Get-Service | Where-Object { $_.Name -match "mysql" } |
        ForEach-Object { Write-Info "  - $($_.Name) [$($_.Status)]" }
    Write-Host ""
    Read-Host "  Nhan Enter de thoat"
    exit 1
}

if ($svc.Status -eq "Running") {
    Write-OK "MySQL dang chay (Running)"
} else {
    Write-Step "Dang khoi dong MySQL..."
    try {
        Start-Service -Name $MySQLSvc -ErrorAction Stop
        Start-Sleep -Seconds 3
        $svc.Refresh()
        if ($svc.Status -eq "Running") {
            Write-OK "MySQL khoi dong thanh cong!"
        } else {
            throw "Trang thai: $($svc.Status)"
        }
    }
    catch {
        Write-Fail "Khong the khoi dong MySQL: $_"
        Write-Warn "Hay chay lai file nay voi quyen Administrator"
        Write-Warn "(Chuot phai vao start-server.bat -> Run as administrator)"
        Write-Host ""
        Read-Host "  Nhan Enter de thoat"
        exit 1
    }
}

Write-Sep

# -- BUOC 2: Kiem tra PHP ------------------------------------
Write-Step "Kiem tra PHP..."

$phpCmd = Get-Command php -ErrorAction SilentlyContinue
if ($null -eq $phpCmd) {
    Write-Fail "Khong tim thay PHP trong PATH."
    Write-Warn "Hay cai PHP hoac them vao bien moi truong PATH."
    Read-Host "  Nhan Enter de thoat"
    exit 1
}
$phpPath    = $phpCmd.Source
$phpVersion = & php -r "echo PHP_VERSION;" 2>$null
Write-OK "PHP $phpVersion  ($phpPath)"

Write-Sep

# -- BUOC 3: Kiem tra port -----------------------------------
Write-Step "Kiem tra port $Port..."
$portInUse = Get-NetTCPConnection -LocalPort $Port -State Listen -ErrorAction SilentlyContinue

if ($portInUse) {
    $pid = $portInUse[0].OwningProcess
    $pname = (Get-Process -Id $pid -ErrorAction SilentlyContinue).Name
    Write-Warn "Port $Port dang duoc su dung boi: $pname (PID $pid)"
    $choice = Read-Host "  Tat tien trinh do va tiep tuc? (y/n)"
    if ($choice -eq 'y' -or $choice -eq 'Y') {
        Stop-Process -Id $pid -Force -ErrorAction SilentlyContinue
        Start-Sleep -Seconds 1
        Write-OK "Da tat tien trinh cu"
    } else {
        Write-Info "Giu nguyen. Server cu co the van chay tai $URL"
    }
} else {
    Write-OK "Port $Port san sang"
}

Write-Sep

# -- BUOC 4: Mo trinh duyet sau 3 giay (background) ----------
$null = Start-Job -ScriptBlock {
    param($url)
    Start-Sleep -Seconds 3
    Start-Process $url
} -ArgumentList $URL

# -- BUOC 5: Khoi dong Laravel server -----------------------
Write-Step "Dang khoi dong Laravel server..."
Write-Info "Thu muc: $ProjectDir"
Write-Info "Dia chi: $URL"
Write-Host ""
Write-Host "  +==========================================+" -ForegroundColor DarkGreen
Write-Host "  |  SERVER DANG CHAY TAI:                  |" -ForegroundColor Green
Write-Host "  |    $URL                    |" -ForegroundColor Green
Write-Host "  |                                          |" -ForegroundColor DarkGreen
Write-Host "  |  Nhan Ctrl+C de dung server             |" -ForegroundColor DarkGreen
Write-Host "  +==========================================+" -ForegroundColor DarkGreen
Write-Host ""

Set-Location $ProjectDir
& php artisan serve --port=$Port --host=127.0.0.1

# -- Sau khi dung server ------------------------------------
Write-Host ""
Write-Sep
Write-Warn "Server da dung."
Write-Host ""

$stopMySQL = Read-Host "  Tat MySQL luon? (y/n)"
if ($stopMySQL -eq 'y' -or $stopMySQL -eq 'Y') {
    Write-Step "Dang tat MySQL..."
    Stop-Service -Name $MySQLSvc -Force -ErrorAction SilentlyContinue
    Write-OK "MySQL da tat"
}

Write-Host ""
Write-Host "  Tam biet! Da dong TiengAnh Server." -ForegroundColor Magenta
Write-Host ""
Start-Sleep -Seconds 2
