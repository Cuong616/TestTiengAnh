@echo off
chcp 65001 >nul 2>&1
title TiengAnh Server Launcher

:: ============================================================
::  TIENGANH - Khoi dong Server
::  Double-click de chay: MySQL + Laravel + Mo trinh duyet
:: ============================================================

:: Kiem tra quyen Administrator
net session >nul 2>&1
if %errorlevel% neq 0 (
    echo.
    echo  [!!] Can quyen Administrator de khoi dong MySQL.
    echo  [>>] Dang yeu cau quyen nang cao...
    echo.

    :: Tu dong mo lai voi quyen Admin
    powershell -Command ^
        "Start-Process cmd -ArgumentList '/c \"\"%~f0\"\"' -Verb RunAs -Wait"
    exit /b
)

:: Da co quyen Admin - chay PowerShell script
echo.
echo  [OK] Quyen Administrator da duoc xac nhan.
echo  [>>] Dang khoi dong TiengAnh Server...
echo.

powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0start-server.ps1"

:: Giu cua so neu co loi
if %errorlevel% neq 0 (
    echo.
    echo  [!!] Co loi xay ra. Nhan phim bat ky de dong...
    pause >nul
)
