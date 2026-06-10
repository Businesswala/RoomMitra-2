import 'package:flutter/material';

class AdAnalyticsScreen extends StatelessWidget {
  final String adId;
  const AdAnalyticsScreen({super.key, required this.adId});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Ad Analytics')),
      body: Center(child: Text('CTR Metrics for Ad: $adId')),
    );
  }
}
