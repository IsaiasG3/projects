import 'package:f1/config/routes/app_router.dart';
import 'package:f1/config/theme/app_theme.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp.router(
      routerConfig: appRouter,
      debugShowCheckedModeBanner: false,
      title: 'Gestión de Estadías',
      theme: AppTheme(selectedColor: 2).theme(),
    );
  }
}
