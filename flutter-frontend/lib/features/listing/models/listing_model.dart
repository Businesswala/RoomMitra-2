class ListingModel {
  final String id;
  final String title;
  final String description;
  final double price;
  final String address;
  final String city;
  final String contactName;
  final String contactMobile;
  final String status;

  ListingModel({
    required this.id,
    required this.title,
    required this.description,
    required this.price,
    required this.address,
    required this.city,
    required this.contactName,
    required this.contactMobile,
    required this.status,
  });

  factory ListingModel.fromJson(Map<String, dynamic> json) {
    return ListingModel(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      price: (json['price'] as num).toDouble(),
      address: json['address'],
      city: json['city']?['name'] ?? '',
      contactName: json['contact_name'],
      contactMobile: json['contact_mobile'],
      status: json['status'] ?? 'pending',
    );
  }
}
