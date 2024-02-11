import 'package:f1/widgets/button_register.dart';
import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';
import 'package:f1/widgets/custom_text_field.dart'; // Importamos el widget RegisterButton

class RegisterPage extends StatefulWidget {
  const RegisterPage({super.key});

  @override
  _RegisterPageState createState() => _RegisterPageState();
  static const String name = 'register';
}

class _RegisterPageState extends State<RegisterPage> {
  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _lastNameController = TextEditingController();
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _phoneNumberController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  final TextEditingController _confirmPasswordController =
      TextEditingController();

  bool _acceptTerms = false;
  bool _acceptPrivacyPolicy = false;

  String _selectedExtension = '+1'; // Valor predeterminado para la extensión

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          'Registro de Cuenta',
          style: TextStyle(
            color: Colors.white,
          ),
        ),
        centerTitle: true,
        backgroundColor: Theme.of(context).primaryColor,
      ),
      body: Container(
        color: Colors.white,
        padding: const EdgeInsets.fromLTRB(20.0, 20.0, 20.0, 20.0),
        child: SingleChildScrollView(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              CustomTextField(
                key: const Key('nameField'),
                controller: _nameController,
                labelText: 'Nombre',
                hintText: 'Ingrese su nombre',
                icon: Icons.person,
                obscureText: false,
                keyboardType: TextInputType.text,
              ),
              CustomTextField(
                key: const Key('lastNameField'),
                controller: _lastNameController,
                labelText: 'Apellidos',
                hintText: 'Ingrese sus apellidos',
                icon: Icons.person_outline,
                obscureText: false,
                keyboardType: TextInputType.text,
              ),
              CustomTextField(
                key: const Key('emailField'),
                controller: _emailController,
                labelText: 'Correo Electrónico',
                hintText: 'correo@example.com',
                icon: Icons.email,
                obscureText: false,
                keyboardType: TextInputType.emailAddress,
              ),
              const SizedBox(height: 16),
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    'Número de Teléfono',
                    style: TextStyle(
                      color: Theme.of(context).primaryColor,
                      fontSize: 16,
                      fontWeight: FontWeight.normal,
                    ),
                  ),
                  const SizedBox(height: 8),
                  Row(
                    children: [
                      Container(
                        padding: EdgeInsets.symmetric(horizontal: 12.0),
                        decoration: BoxDecoration(
                          border:
                              Border.all(color: Theme.of(context).primaryColor),
                          borderRadius: BorderRadius.circular(8.0),
                        ),
                        child: DropdownButton<String>(
                          value: _selectedExtension,
                          onChanged: (String? newValue) {
                            setState(() {
                              _selectedExtension = newValue!;
                            });
                          },
                          items: <String>[
                            '+1',
                            '+52',
                            '+34',
                            '+91',
                          ].map<DropdownMenuItem<String>>((String value) {
                            return DropdownMenuItem<String>(
                              value: value,
                              child: Text(value),
                            );
                          }).toList(),
                        ),
                      ),
                      const SizedBox(width: 10),
                      Expanded(
                        flex: 2,
                        child: Material(
                          borderRadius: BorderRadius.circular(8.0),
                          elevation: 2,
                          child: TextFormField(
                            controller: _phoneNumberController,
                            obscureText: false,
                            keyboardType: TextInputType.phone,
                            decoration: InputDecoration(
                              hintText: 'Ingrese su número de teléfono',
                              hintStyle: const TextStyle(color: Colors.grey),
                              prefixIcon: const Icon(Icons.phone),
                              contentPadding: const EdgeInsets.symmetric(
                                  vertical: 15.0, horizontal: 20.0),
                            ),
                          ),
                        ),
                      ),
                    ],
                  ),
                ],
              ),
              CustomTextField(
                key: const Key('passwordField'),
                controller: _passwordController,
                labelText: 'Contraseña',
                hintText: 'Contraseña',
                icon: Icons.lock,
                obscureText: true,
                keyboardType: TextInputType.visiblePassword,
              ),
              CustomTextField(
                key: const Key('confirmPasswordField'),
                controller: _confirmPasswordController,
                labelText: 'Confirmar Contraseña',
                hintText: 'Confirmar contraseña',
                icon: Icons.lock_outline,
                obscureText: true,
                keyboardType: TextInputType.visiblePassword,
              ),
              const SizedBox(height: 10.0),
              Row(
                children: [
                  Checkbox(
                    value: _acceptTerms,
                    onChanged: (value) {
                      showAboutDialog(
                          barrierDismissible: false,
                          context: context,
                          children: [
                            const Text(
                                'Aute amet dolore ipsum ex adipisicing incididunt pariatur eiusmod ipsum duis voluptate commodo qui. Non anim nulla enim do sunt minim anim sit nostrud sunt. Ex culpa ipsum voluptate ut qui Lorem ad. Consequat dolor duis nulla ipsum ea. Nostrud nulla nulla ad pariatur ullamco cupidatat aliquip irure dolore amet deserunt nulla veniam. Id ut duis nulla in commodo elit. Laboris ea ipsum aute excepteur quis magna elit est incididunt veniam deserunt ad veniam.')
                          ]);
                      setState(() {
                        _acceptTerms = value!;
                      });
                    },
                    activeColor: Theme.of(context).primaryColor,
                  ),
                  const Text('Aceptar los términos y condiciones'),
                ],
              ),
              Row(
                children: [
                  Checkbox(
                    value: _acceptPrivacyPolicy,
                    onChanged: (value) {
                      setState(() {
                        _acceptPrivacyPolicy = value!;
                      });
                    },
                    activeColor: Theme.of(context).primaryColor,
                  ),
                  const Text('Aceptar las políticas de privacidad'),
                ],
              ),
              const SizedBox(height: 20.0),
              ButtonRegister(
                onPressed: () {
                  _register(context);
                },
              ),
              const SizedBox(height: 10.0),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  TextButton(
                    onPressed: () {
                      context.go('/login');
                    },
                    child: const Text(
                      '¿Ya tienes una cuenta? Inicia sesión',
                      style: TextStyle(color: Colors.blue),
                    ),
                  ),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }

  void _register(BuildContext context) {
    // Lógica para manejar el registro de la cuenta

    ScaffoldMessenger.of(context).clearSnackBars();

    final snakback = SnackBar(
      content: Row(
        children: [
          // Espacio entre el icono y el texto
          Text(
            'Solicitud Enviada',
            style: TextStyle(fontSize: 16), // Ajusta el tamaño de la fuente
          ),
          SizedBox(width: 9),
          Icon(
            Icons.send,
            color: Colors.white,
          ),
        ],
      ),
      action: SnackBarAction(label: '', onPressed: () {}),
      duration: const Duration(seconds: 2),
      backgroundColor: Theme.of(context).primaryColor,
    );

    ScaffoldMessenger.of(context).showSnackBar(snakback);
  }
}
