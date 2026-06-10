import 'package:flutter/material';

class DocumentVerificationScreen extends StatelessWidget {
  const DocumentVerificationScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Document Verification')),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            const Text('Upload Aadhaar/PAN Card and selfie to get verified badge.', textAlign: TextAlign.center),
            const SizedBox(height: 24),
            ElevatedButton(onPressed: () {}, child: const Text('Choose Document')),
            const SizedBox(height: 16),
            ElevatedButton(onPressed: () {}, child: const Text('Upload Selfie')),
          ],
        ),
      ),
    );
  }
}
