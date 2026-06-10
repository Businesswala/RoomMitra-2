import 'package:flutter/material';

class NotificationsScreen extends StatelessWidget {
  const NotificationsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Notifications')),
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: const [
          ListTile(
            title: Text('New Message'),
            subtitle: Text('Alpesh Patel replied to your inquiry.'),
          )
        ],
      ),
    );
  }
}
