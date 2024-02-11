/*import 'package:flutter/material.dart';

class CustomTextField extends StatefulWidget {
  final TextEditingController controller;
  final String labelText;
  final String hintText;
  final bool obscureText;
  final IconData icon;

  const CustomTextField({
    required Key key,
    required this.controller,
    required this.labelText,
    this.hintText = '',
    this.obscureText = false,
    required this.icon,
  }) : super(key: key);

  @override
  _CustomTextFieldState createState() => _CustomTextFieldState();
}

class _CustomTextFieldState extends State<CustomTextField> {
  bool _passwordVisible = false;

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(top: 20.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            widget.labelText,
            style: TextStyle(
              color: Theme.of(context).primaryColor,
              fontSize: 16, // Tamaño de letra reducido
              fontWeight: FontWeight.normal, // Texto en negrita
            ),
          ),
          SizedBox(height: 8), // Espacio adicional
          Material(
            borderRadius: BorderRadius.circular(8.0),
            elevation: 2, // Agregamos una elevación al Material
            child: TextFormField(
              controller: widget.controller,
              obscureText: widget.obscureText && !_passwordVisible,
              onChanged: (_) => setState(() {}),
              onTap: () => setState(() {}),
              decoration: InputDecoration(
                hintText: widget.controller.text.isEmpty ? widget.hintText : '',
                hintStyle: TextStyle(color: Colors.grey),
                prefixIcon: widget.icon != null ? Icon(widget.icon) : null,
                suffixIcon: widget.obscureText
                    ? IconButton(
                        icon: Icon(_passwordVisible
                            ? Icons.visibility
                            : Icons.visibility_off),
                        onPressed: () {
                          setState(() {
                            _passwordVisible = !_passwordVisible;
                          });
                        },
                      )
                    : null,
                enabledBorder: OutlineInputBorder(
                  borderSide: BorderSide(color: Theme.of(context).primaryColor),
                  borderRadius: BorderRadius.circular(8.0),
                ),
                focusedBorder: OutlineInputBorder(
                  borderSide: BorderSide(color: Theme.of(context).primaryColor),
                  borderRadius: BorderRadius.circular(8.0),
                ),
                border: OutlineInputBorder(
                  borderSide: BorderSide(color: Theme.of(context).primaryColor),
                  borderRadius: BorderRadius.circular(8.0),
                ),
                contentPadding: EdgeInsets.symmetric(
                  vertical: 15.0,
                  horizontal: 20.0,
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}

class LoginPage extends StatelessWidget {
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();

  LoginPage({super.key});

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
      body: Container(
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
            ),
            CustomTextField(
              key: const Key('passwordField'),
              controller: _passwordController,
              labelText: 'Ingrese su contraseña',
              hintText: 'Contraseña',
              obscureText: true,
              icon: Icons.lock,
            ),
            const SizedBox(height: 10.0),
            TextButton(
              onPressed: () {
                // Lógica para manejar la recuperación de contraseña
              },
              child: Text(
                '¿Olvidó su contraseña?',
                style: TextStyle(color: Theme.of(context).primaryColor),
              ),
            ),
            const SizedBox(height: 20.0),
            SizedBox(
              width: double.infinity,
              child: ElevatedButton.icon(
                onPressed: () {
                  _login(context);
                },
                style: ElevatedButton.styleFrom(
                  backgroundColor: Theme.of(context).primaryColor,
                ),
                icon: const Icon(
                  Icons.login,
                  color: Colors.white, // Color blanco para el icono
                ),
                label: const Text(
                  'Acceder',
                  style: TextStyle(color: Colors.white),
                ),
              ),
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
                    // Lógica para manejar la solicitud de acceso
                  },
                  child: Text(
                    'Solicítalo ahora',
                    style: TextStyle(color: Theme.of(context).primaryColor),
                  ),
                ),
              ],
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





import 'package:flutter/material.dart';
import 'login.dart'; // Importar la vista LoginPage

class RegisterPage extends StatefulWidget {
  @override
  _RegisterPageState createState() => _RegisterPageState();
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

  String _selectedExtension = '+1'; // Valor inicial del selector de extensión

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
              ),
              CustomTextField(
                key: const Key('lastNameField'),
                controller: _lastNameController,
                labelText: 'Apellidos',
                hintText: 'Ingrese sus apellidos',
                icon: Icons.person_outline,
                obscureText: false,
              ),
              CustomTextField(
                key: const Key('emailField'),
                controller: _emailController,
                labelText: 'Correo Electrónico',
                hintText: 'correo@example.com',
                icon: Icons.email,
                obscureText: false,
              ),
              Row(
                children: [
                  Expanded(
                    child: Container(
                      margin: const EdgeInsets.only(
                          top:
                              45.0), // Margen inferior para empujar hacia abajo solo la columna del select
                      child: DropdownButtonFormField<String>(
                        value: _selectedExtension,
                        onChanged: (String? newValue) {
                          setState(() {
                            _selectedExtension = newValue!;
                          });
                        },
                        items: <String>['Extension', '+1', '+52', '+34', '+91']
                            .map<DropdownMenuItem<String>>((String value) {
                          return DropdownMenuItem<String>(
                            value: value,
                            child: Text(value),
                          );
                        }).toList(),
                      ),
                    ),
                  ),
                  const SizedBox(width: 10),
                  Expanded(
                    flex: 2,
                    child: CustomTextField(
                      key: const Key('phoneNumberField'),
                      controller: _phoneNumberController,
                      labelText: 'Número de Teléfono',
                      hintText: 'Ingrese su número de teléfono',
                      icon: Icons.phone,
                      obscureText: false,
                    ),
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
              ),
              CustomTextField(
                key: const Key('confirmPasswordField'),
                controller: _confirmPasswordController,
                labelText: 'Confirmar Contraseña',
                hintText: 'Confirmar contraseña',
                icon: Icons.lock_outline,
                obscureText: true,
              ),
              const SizedBox(height: 10.0),
              Row(
                children: [
                  Checkbox(
                    value: _acceptTerms,
                    onChanged: (value) {
                      setState(() {
                        _acceptTerms = value!;
                      });
                    },
                    activeColor: Theme.of(context).primaryColor,
                  ),
                  Text('Aceptar los términos y condiciones'),
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
                  Text('Aceptar las políticas de privacidad'),
                ],
              ),
              const SizedBox(height: 20.0),
              SizedBox(
                width: double.infinity,
                child: ElevatedButton(
                  onPressed: () {
                    // Lógica para manejar el registro de la cuenta
                  },
                  style: ElevatedButton.styleFrom(
                    backgroundColor: Theme.of(context).primaryColor,
                  ),
                  child: const Text(
                    'Solicitar',
                    style: TextStyle(color: Colors.white),
                  ),
                ),
              ),
              const SizedBox(height: 10.0),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  TextButton(
                    onPressed: () {
                      Navigator.pushReplacement(
                        context,
                        MaterialPageRoute(builder: (context) => LoginPage()),
                      );
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
}

class CustomTextField extends StatefulWidget {
  final TextEditingController controller;
  final String labelText;
  final String hintText;
  final bool obscureText;
  final IconData icon;

  const CustomTextField({
    required Key key,
    required this.controller,
    required this.labelText,
    this.hintText = '',
    this.obscureText = false,
    required this.icon,
  }) : super(key: key);

  @override
  _CustomTextFieldState createState() => _CustomTextFieldState();
}

class _CustomTextFieldState extends State<CustomTextField> {
  bool _passwordVisible = false;

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(top: 20.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            widget.labelText,
            style: TextStyle(
              color: Theme.of(context).primaryColor,
              fontSize: 16,
              fontWeight: FontWeight.normal,
            ),
          ),
          const SizedBox(height: 8),
          Material(
            borderRadius: BorderRadius.circular(8.0),
            elevation: 2,
            child: TextFormField(
              controller: widget.controller,
              obscureText: widget.obscureText && !_passwordVisible,
              onChanged: (_) => setState(() {}),
              onTap: () => setState(() {}),
              decoration: InputDecoration(
                hintText: widget.controller.text.isEmpty ? widget.hintText : '',
                hintStyle: const TextStyle(color: Colors.grey),
                prefixIcon: widget.icon != null ? Icon(widget.icon) : null,
                suffixIcon: widget.obscureText
                    ? IconButton(
                        icon: Icon(_passwordVisible
                            ? Icons.visibility
                            : Icons.visibility_off),
                        onPressed: () {
                          setState(() {
                            _passwordVisible = !_passwordVisible;
                          });
                        },
                      )
                    : null,
                enabledBorder: OutlineInputBorder(
                  borderSide: BorderSide(color: Theme.of(context).primaryColor),
                  borderRadius: BorderRadius.circular(8.0),
                ),
                focusedBorder: OutlineInputBorder(
                  borderSide: BorderSide(color: Theme.of(context).primaryColor),
                  borderRadius: BorderRadius.circular(8.0),
                ),
                border: OutlineInputBorder(
                  borderSide: BorderSide(color: Theme.of(context).primaryColor),
                  borderRadius: BorderRadius.circular(8.0),
                ),
                contentPadding: const EdgeInsets.symmetric(
                  vertical: 15.0,
                  horizontal: 20.0,
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}

 */

