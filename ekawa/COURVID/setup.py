"""Fichier d'installation de notre script Courvid."""

from cx_Freeze import setup, Executable


setup(
    name = "Courvid",
    version = "1.0",
    description = "Ce programme simule un petit jeu en lien avec le COVID ",
    executables = [Executable("game.py")],
)