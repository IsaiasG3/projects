import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:f1/widgets/button_custom.dart';
import 'package:stroke_text/stroke_text.dart';

class HomePage extends StatelessWidget {
  static const String name = '/';

  const HomePage({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        fit: StackFit.expand,
        children: [
          Image.asset(
            'assets/images/imagen.jfif', // Reemplaza con tu imagen de fondo
            fit: BoxFit.cover, // Ajustar al tamaño del dispositivo
          ),
          Container(
            decoration: BoxDecoration(
              gradient: LinearGradient(
                begin: Alignment.topCenter,
                end: Alignment.bottomCenter,
                colors: [
                  Colors.transparent,
                  Colors.black,
                ],
                stops: [0.0, 0.8], // Ajusta los puntos de parada aquí
              ),
            ),
          ),
          Column(
            mainAxisAlignment: MainAxisAlignment.end,
            children: [
              Padding(
                padding: const EdgeInsets.all(20.0),
                child: Column(
                  children: [
                    StrokeText(
                      text: 'Tu estancia, tu control.',
                      textStyle: TextStyle(fontSize: 35),
                    ),
                    Text(
                      'Preparación para el éxito profesional',
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        fontSize: 26,
                        color: Colors.white,
                      ),
                    ),
                    const SizedBox(height: 20),
                    Button_Custom(
                      onPressed: () {
                        GoRouter.of(context).go('/login');
                      },
                      text: 'Comenzar Ahora',
                      icon: Icons.login,
                    ),
                  ],
                ),
              ),
            ],
          ),
        ],
      ),
    );
  }
}
