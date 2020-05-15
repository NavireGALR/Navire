"""Fichier d'installation de notre script Courvid."""

from cx_Freeze import setup, Executable


setup(
    name = "RPG_BAST",
    version = "1.0",
    description = "Ce programme simule un petit RPG ",
    executables = [Executable("rpg.py")],
)