import 'package:flutter/material';

class MyListingsScreen extends StatelessWidget {
  const MyListingsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('My Listings')),
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: const [
          Card(
            child: ListTile(
              title: Text('Vastrapur Single Room'),
              subtitle: Text('Status: Pending Admin Moderation'),
            ),
          ),
        ],
      ),
    );
  }
}
