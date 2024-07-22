<?php

interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        // Draw a circle
    }
}

class Square implements Shape {
    public function draw() {
        // Draw a square
    }
}
