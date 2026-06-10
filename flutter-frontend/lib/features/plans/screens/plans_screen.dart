import 'package:flutter/material';

class PlansScreen extends StatelessWidget {
  const PlansScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Plans & Pricing')),
      body: const Center(child: Text('Subscription Plans List')),
    );
  }
}
