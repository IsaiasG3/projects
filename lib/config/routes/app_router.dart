
import 'package:f1/screens/screens.dart';
import 'package:go_router/go_router.dart';

final appRouter = GoRouter(
  initialLocation: '/',
  routes: [
    GoRoute(
      path: '/',
      name: HomePage.name,
      builder: (context, state) => HomePage(),
    ),
    GoRoute(
      path: '/login',
      name: LoginPage.name,
      builder: (context, state) => LoginPage(),
    ),
    GoRoute(
      path: '/register',
      name: RegisterPage.name,
      builder: (context, state) => RegisterPage(),
    ),
    GoRoute(
      path: '/recuperar',
      name: RecuperarPage.name,
      builder: (context, state) => RecuperarPage(),
    ),
    GoRoute(
      path: '/destress',
      name: AnimatedPage.name,
      builder: (context, state) => AnimatedPage(),
    ),
     GoRoute(
      path: '/tutorial',
      name: AppTutorialPage.name,
      builder: (context, state) => const AppTutorialPage(),
    ),
     GoRoute(
      path: '/principal',
      name: PrincipalPage.name,
      builder: (context, state) => const PrincipalPage(),
    ),
     GoRoute(
      path: '/config',
      name:  ConfigPage.name,
      builder: (context, state) => const ConfigPage(),
    ),
  ],
);
