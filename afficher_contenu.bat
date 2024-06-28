@echo off
for %%f in (*.txt) do (
    echo Contenu du fichier : %%f
    type "%%f"
    echo ------------------------------
)
