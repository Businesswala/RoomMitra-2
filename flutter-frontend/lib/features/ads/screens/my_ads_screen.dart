import 'package:flutter/material';

class MyAdsScreen extends StatelessWidget {
  const MyAdsScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('My Advertisements')),
      body: const Center(child: Text('Ads Placement')),
    );
  }
}
