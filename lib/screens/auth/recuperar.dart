import 'package:f1/widgets/button_custom.dart';
import 'package:flutter/material.dart';
import 'package:f1/widgets/custom_text_field.dart';

class RecuperarPage extends StatelessWidget {
  static const String name = 'recuperar';
  final TextEditingController _emailController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          'Recuperar contraseña',
          style: TextStyle(
            color: Colors.white,
          ),
        ),
        centerTitle: true,
        backgroundColor: Theme.of(context).primaryColor,
      ),
      body: SingleChildScrollView(
        child: Container(
          color: Colors.white,
          padding: const EdgeInsets.fromLTRB(20.0, 40.0, 20.0, 20.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              // Imagen encima del formulario
            Container(
                height: 250,
                width: 250,
                decoration: BoxDecoration(
                  image: DecorationImage(
                    image: AssetImage('assets/images/app-logo.png'),
                    fit: BoxFit.cover,
                  ),
                ),
              ),
        const SizedBox(height: 50),
              // Formulario
              Column(
                children: [
                  Text(
                    'Ingrese su correo electrónico',
                    style: TextStyle(
                      color: Theme.of(context).primaryColor,
                      fontSize: 24,
                      fontWeight: FontWeight.normal,
                    ),
                  ),
                  const SizedBox(height: 8),
                  CustomTextField(
                    controller: _emailController,
                    labelText: 'Correo electrónico',
                    hintText: 'correo@example.com',
                    icon: Icons.email,
                    keyboardType: TextInputType.emailAddress,
                    key: const Key('emailField'),
                  ),
                  const SizedBox(height: 20.0),
                  SizedBox(
                      // Ajusta el botón para que ocupe todo el ancho de la pantalla
                      width: double.infinity,
                      child: Button_Custom(
                        icon: Icons.send,
                        text: 'Solicitar Restablecimiento',
                        onPressed: () {
                            _enviarSolicitud(context);
                        },
                      )),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }

  void _enviarSolicitud(BuildContext context) {
    // Lógica para enviar la solicitud de recuperación de contraseña
    final String email = _emailController.text;
    // Implementa aquí la lógica para enviar la solicitud de recuperación de contraseña
    // Por ejemplo, puedes mostrar un diálogo de éxito o error.
    // También puedes enviar una solicitud al servidor para recuperar la contraseña.
    // Este método es solo un ejemplo, debes adaptarlo a tu aplicación y backend.
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: Text('Solicitud enviada'),
          content: Text(
              'Se ha enviado un correo electrónico a $email con instrucciones para recuperar la contraseña.'),
          actions: <Widget>[
            TextButton(
              onPressed: () {
                Navigator.of(context).pop();
              },
              child: Text('Aceptar'),
            ),
          ],
        );
      },
    );
  }
}
