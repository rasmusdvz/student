#!/bin/bash
SRC=src/main/java
CLASS=javaapplication42/JavaApplication42
TARGET=target
CLASSES=$TARGET/classes
echo "Starte Java Compiler..."
javac -d $CLASSES $SRC/$CLASS.java
echo "Fertig."
echo "Starte Programm."
cd $TARGET/classes
java $CLASS
