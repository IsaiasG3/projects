import 'package:flutter/material.dart';

class ButtonLogin extends StatelessWidget {
  final VoidCallback onPressed;

  const ButtonLogin({Key? key, required this.onPressed}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: double.infinity,
      child: Material(
        borderRadius: BorderRadius.circular(20), // Ajusta el radio a tu preferencia
        color: Theme.of(context).primaryColor,
        child: InkWell(
          onTap: onPressed,
          borderRadius: BorderRadius.circular(20), // Ajusta el radio a tu preferencia
          child: Padding(
            padding: const EdgeInsets.symmetric(vertical: 5), // Ajusta el relleno a tu preferencia
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Icon(
                  Icons.login,
                  color: Colors.white,
                ),
                const SizedBox(width: 8), // Espacio entre el icono y el texto
                Text(
                  'Ingresar',
                  style: TextStyle(color: Colors.white),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
