import 'package:flutter/material.dart';

class ButtonRegister extends StatelessWidget {
  final VoidCallback onPressed;

  const ButtonRegister({Key? key, required this.onPressed}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: double.infinity,
      child: ElevatedButton.icon(
        onPressed: onPressed,
        style: ElevatedButton.styleFrom(
          backgroundColor: Theme.of(context).primaryColor,
        ),
        icon: const Icon(
          Icons.send,
          color: Colors.white,
        ),
        label: const Text(
          'Solicitar',
          style: TextStyle(color: Colors.white),
        ),
      ),
    );
  }
}
