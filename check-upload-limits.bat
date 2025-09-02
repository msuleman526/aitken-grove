@echo off
echo.
echo ==========================================
echo    FILAMENT UPLOAD LIMIT INCREASE TOOL
echo ==========================================
echo.
echo Running upload limit configuration check...
echo.

php scripts\increase-upload-limits.php

echo.
echo Press any key to exit...
pause >nul
