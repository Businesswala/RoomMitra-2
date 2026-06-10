import 'package:flutter/material';

class SubscriptionHistoryScreen extends StatelessWidget {
  const SubscriptionHistoryScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Subscription History')),
      body: const Center(child: Text('Purchase Logs')),
    );
  }
}
