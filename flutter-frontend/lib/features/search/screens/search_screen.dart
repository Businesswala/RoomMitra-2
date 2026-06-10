import 'package:flutter/material';

class SearchScreen extends StatelessWidget {
  const SearchScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Search')),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            TextField(
              decoration: InputDecoration(
                hintText: 'Search...',
                suffixIcon: IconButton(onPressed: () {}, icon: const Icon(Icons.filter_list)),
              ),
            ),
            const Expanded(
              child: Center(child: Text('Search and Apply Filters')),
            ),
          ],
        ),
      ),
    );
  }
}
