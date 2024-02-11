import 'package:flutter/material.dart';

class MenuItem {
  final String title;
  final String link;
  final IconData icon;

  const MenuItem({required this.title, required this.link, required this.icon});
}

const appMenuItems = <MenuItem>[
  MenuItem(title: 'Home', link: '/principal', icon: Icons.home),
  MenuItem(title: 'Configuraciones', link: '/config', icon: Icons.settings),
  MenuItem(
    title: 'Juega un Poco',
    link: '/destress',
    icon: Icons.videogame_asset_outlined,
  )
];
