import 'package:flutter/material';
import 'package:go_router/go_router.dart';

class ConversationListScreen extends StatelessWidget {
  const ConversationListScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Messages')),
      body: ListView(
        children: [
          ListTile(
            leading: const CircleAvatar(child: Text('A')),
            title: const Text('Alpesh Patel'),
            subtitle: const Text('Hello, is the room still vacant?'),
            onTap: () => context.push('/chat/conv_id_123'),
          )
        ],
      ),
    );
  }
}
