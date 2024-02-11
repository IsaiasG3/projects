import 'dart:math' show Random;
import 'package:flutter/material.dart';

class ConfigPage extends StatefulWidget {
  static const name = 'configuraciones';

  const ConfigPage({Key? key}) : super(key: key);

  @override
  State<ConfigPage> createState() => _AnimatedPageState();
}

class _AnimatedPageState extends State<ConfigPage> {
  double width = 50;
  double height = 50;
  Color color = Colors.indigo;
  double borderRadius = 10.0;

  void changeShape() {
    final random = Random();

    width = random.nextInt(300) + 120;
    height = random.nextInt(300) + 120;
    borderRadius = random.nextInt(100) + 20;

    color = Color.fromRGBO(
      random.nextInt(255), // red
      random.nextInt(255), // green
      random.nextInt(255), // blue
      1, // opacity
    );
    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        changeShape();
      },
      child: Scaffold(
        appBar: AppBar(
          title: const Text(
            'Configuraciones',
            style: TextStyle(
              color: Colors.white,
            ),
          ),
          centerTitle: true,
          backgroundColor: Theme.of(context).primaryColor,
        ),
        body: Center(
          child: AnimatedContainer(
            duration: const Duration(milliseconds: 400),
            curve: Curves.easeOutCubic,
            width: width <= 0 ? 0 : width,
            height: height <= 0 ? 0 : height,
            decoration: BoxDecoration(
              color: color,
              borderRadius:
                  BorderRadius.circular(borderRadius < 0 ? 0 : borderRadius),
            ),
          ),
        ),
      ),
    );
  }
}
