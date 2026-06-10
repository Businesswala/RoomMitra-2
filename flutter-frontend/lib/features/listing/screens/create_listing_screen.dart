import 'package:flutter/material';

class CreateListingScreen extends StatelessWidget {
  const CreateListingScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Post a Listing')),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            const TextField(decoration: InputDecoration(labelText: 'Title')),
            const SizedBox(height: 16),
            const TextField(decoration: InputDecoration(labelText: 'Price')),
            const SizedBox(height: 16),
            const TextField(decoration: InputDecoration(labelText: 'Address')),
            const SizedBox(height: 16),
            const TextField(maxLines: 4, decoration: InputDecoration(labelText: 'Description')),
            const SizedBox(height: 24),
            ElevatedButton(
              onPressed: () {},
              style: ElevatedButton.styleFrom(minimumSize: const Size(double.infinity, 50)),
              child: const Text('Submit Listing'),
            ),
          ],
        ),
      ),
    );
  }
}
