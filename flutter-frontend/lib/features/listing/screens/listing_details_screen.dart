import 'package:flutter/material';

class ListingDetailsScreen extends StatelessWidget {
  final String listingId;
  const ListingDetailsScreen({super.key, required this.listingId});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Listing Details')),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text('Listing ID: $listingId', style: const TextStyle(color: Colors.grey)),
            const SizedBox(height: 16),
            const Text('Vastrapur Luxury Student Room', style: TextStyle(fontSize: 22, fontWeight: FontWeight.bold)),
            const SizedBox(height: 8),
            const Text('Ahmedabad, Gujarat', style: TextStyle(color: Colors.blue, fontSize: 16)),
            const SizedBox(height: 16),
            const Text('Description', style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18)),
            const SizedBox(height: 8),
            const Text('Neat and clean single occupancy room for boys next to Vastrapur Lake. Amenities like WiFi and AC are fully loaded.'),
            const Spacer(),
            ElevatedButton(
              onPressed: () {},
              style: ElevatedButton.styleFrom(minimumSize: const Size(double.infinity, 50)),
              child: const Text('Chat with Lister'),
            ),
          ],
        ),
      ),
    );
  }
}
