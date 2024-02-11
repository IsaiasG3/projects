import 'dart:io';

import 'package:flutter/material.dart';

const Color _customColor = Color.fromARGB(255, 1, 63, 42);

const List<Color> _colorThemes = [
  _customColor,
  Colors.blue,
  Colors.teal,
  Colors.green,
  Colors.yellow,
  Colors.orange,
  Colors.pink,
];

class AppTheme {
  final int selectedColor;

  AppTheme({required this.selectedColor})
      : assert(selectedColor >= 0 && selectedColor <= _colorThemes.length - 1);
  ThemeData theme() {
    return ThemeData(colorSchemeSeed: _colorThemes[selectedColor],
    //brightness: Brightness.dark
    );
  }
}
