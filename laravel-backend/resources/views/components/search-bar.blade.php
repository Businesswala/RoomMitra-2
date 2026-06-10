<div class="max-w-4xl mx-auto bg-white rounded-2xl md:rounded-full p-3 md:p-2 shadow-2xl flex flex-col md:flex-row items-center gap-3 border border-slate-200" x-data="{ category: 'rooms', city: 'Ahmedabad' }">
    
    <!-- Location input -->
    <div class="w-full md:w-1/3 flex items-center px-4 py-2 border-b md:border-b-0 md:border-r border-slate-100">
        <i class="fa-solid fa-location-dot text-primary-500 text-lg mr-3"></i>
        <div class="text-left w-full">
            <label class="block text-[10px] uppercase font-bold text-slate-400">City</label>
            <select class="block w-full font-semibold text-slate-700 bg-transparent focus:outline-none text-sm cursor-pointer" x-model="city">
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Surat">Surat</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Pune">Pune</option>
                <option value="Bengaluru">Bengaluru</option>
            </select>
        </div>
    </div>
    
    <!-- Category Input -->
    <div class="w-full md:w-1/3 flex items-center px-4 py-2 border-b md:border-b-0 md:border-r border-slate-100">
        <i class="fa-solid fa-hotel text-primary-500 text-lg mr-3"></i>
        <div class="text-left w-full">
            <label class="block text-[10px] uppercase font-bold text-slate-400">Living Services</label>
            <select class="block w-full font-semibold text-slate-700 bg-transparent focus:outline-none text-sm cursor-pointer" x-model="category">
                <option value="rooms">Rooms for Rent</option>
                <option value="pg">PG & Hostels</option>
                <option value="roommate">Roommate Match</option>
                <option value="tiffin">Tiffin Delivery</option>
                <option value="laundry">Laundry Services</option>
            </select>
        </div>
    </div>
    
    <!-- Budget range -->
    <div class="w-full md:w-1/4 flex items-center px-4 py-2">
        <i class="fa-solid fa-indian-rupee-sign text-primary-500 text-lg mr-3"></i>
        <div class="text-left w-full">
            <label class="block text-[10px] uppercase font-bold text-slate-400">Max Budget</label>
            <input type="text" placeholder="₹10,000" class="block w-full font-semibold text-slate-700 bg-transparent focus:outline-none text-sm placeholder:text-slate-400" />
        </div>
    </div>
    
    <!-- Search Button -->
    <a :href="'/listings?category=' + category + '&city=' + city" class="w-full md:w-auto bg-primary-500 hover:bg-primary-600 text-white rounded-xl md:rounded-full px-8 py-3.5 font-bold transition flex items-center justify-center shadow-md">
        <i class="fa-solid fa-magnifying-glass mr-2"></i>Search
    </a>
</div>
