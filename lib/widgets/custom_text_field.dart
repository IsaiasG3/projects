import 'package:flutter/material.dart';

class CustomTextField extends StatefulWidget {
  final TextEditingController controller;
  final String labelText;
  final String hintText;
  final bool obscureText;
  final IconData icon;
  final TextInputType keyboardType; // Agregamos el tipo de teclado

  const CustomTextField({
    required Key key,
    required this.controller,
    required this.labelText,
    this.hintText = '',
    this.obscureText = false,
    required this.icon,
    required this.keyboardType, // Parámetro agregado
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
              keyboardType: widget.keyboardType, // Configuramos el tipo de teclado
              decoration: InputDecoration(
                hintText: widget.controller.text.isEmpty ? widget.hintText : '',
                hintStyle: const TextStyle(color: Colors.grey),
                prefixIcon: Icon(widget.icon),
                suffixIcon: widget.obscureText
                    ? IconButton(
                        icon: Icon(_passwordVisible ? Icons.visibility : Icons.visibility_off),
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
