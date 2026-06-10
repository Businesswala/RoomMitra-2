import 'package:flutter/material';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'core/theme/app_theme.dart';
import 'core/routes/app_router.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  // Initialize Firebase here if google-services.json is configured
  
  runApp(
    const ProviderScope(
      child: RoomMitraApp(),
    ),
  );
}

class RoomMitraApp extends ConsumerWidget {
  const RoomMitraApp({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final router = ref.watch(appRouterGenProvider);

    return MaterialApp.router(
      title: 'RoomMitra',
      debugShowCheckedModeBanner: false,
      theme: AppTheme.lightTheme,
      darkTheme: AppTheme.darkTheme,
      themeMode: ThemeMode.system,
      routerConfig: router,
    );
  }
}
