import 'package:f1/widgets/button_login.dart';
import 'package:f1/widgets/custom_text_field.dart';
import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';

class LoginPage extends StatelessWidget {
  static const String name = 'login';

  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  LoginPage({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          'Inicia sesión con tu cuenta',
          style: TextStyle(
            color: Colors.white,
          ),
        ),
        centerTitle: true,
        backgroundColor: Theme.of(context).primaryColor,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            SizedBox(height: 40), // Añadir espacio entre el título y la imagen
            // Aquí está la imagen encima del formulario
            Container(
              margin: EdgeInsets.only(
                  bottom: 10), // Margen inferior para separación
              child: Container(
                height: 250,
                width: 250,
                decoration: BoxDecoration(
                  image: DecorationImage(
                    image: AssetImage('assets/images/app-logo.png'),
                    fit: BoxFit.cover,
                  ),
                ),
              ),
            ),
            // Aquí comienza el formulario
            Container(
              color: Colors.white,
              padding: const EdgeInsets.fromLTRB(20.0, 40.0, 20.0, 20.0),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  CustomTextField(
                    key: const Key('emailField'),
                    controller: _emailController,
                    labelText: 'Ingrese su correo electrónico',
                    hintText: 'correo@example.com',
                    icon: Icons.email,
                    obscureText: false,
                    keyboardType: TextInputType.emailAddress,
                  ),
                  CustomTextField(
                    key: const Key('passwordField'),
                    controller: _passwordController,
                    labelText: 'Ingrese su contraseña',
                    hintText: 'Contraseña',
                    obscureText: true,
                    icon: Icons.lock,
                    keyboardType: TextInputType.visiblePassword,
                  ),
                  const SizedBox(height: 10.0),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      Row(
                        children: [
                          Text(
                            '¿Olvidó su contraseña?',
                            style: TextStyle(
                                color: Theme.of(context).primaryColor),
                          ),
                          TextButton(
                            onPressed: () {
                              // Navegar a la vista de recuperación
                              context.go('/recuperar');
                            },
                            child: Text(
                              'Recuperela ahora',
                              style: TextStyle(
                                  color: Theme.of(context).primaryColor),
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                  const SizedBox(height: 20.0),
                  ButtonLogin(
                    onPressed: () {
                      _login(context);
                      context.go('/tutorial');
                    },
                  ),
                  const SizedBox(height: 10.0),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Text(
                        '¿Aun no tienes acceso a tu cuenta?',
                        style: TextStyle(color: Theme.of(context).primaryColor),
                      ),
                      TextButton(
                        onPressed: () {
                          context.go('/register');
                        },
                        child: Text(
                          'Solicítalo ahora',
                          style:
                              TextStyle(color: Theme.of(context).primaryColor),
                        ),
                      ),
                    ],
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  void _login(BuildContext context) {
    // Lógica de inicio de sesión
  }
}
