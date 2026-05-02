const cars = [
  {
    id: 1,
    name: "AE86 Trueno",
    shortDesc: "Lightweight legend, perfect for drifting.",
    image: "https://media.carsandbids.com/cdn-cgi/image/width=2080,quality=70/438ad923cef6d8239e95d61e7d6849486bae11d9/photos/exterior/rMLg22E4-wwcbrPMJB5u/edit/2DVXt.jpg?t=173048735010w=600&h=400&fit=crop",
    price: "$45,000",
    year: "1985-1987",
    engine: "4A-GE 1.6L Naturally Aspirated",
    horsepower: "130 HP",
    weight: "960 kg",
    fullDesc: "The AE86 Trueno is a lightweight, nimble sports car that became a drifting legend. Known for its perfect weight distribution and responsive handling, it's the ultimate platform for drivers seeking pure driving experience without modern electronics."
  },
  {
    id: 2,
    name: "R34 V-Spec",
    shortDesc: "Iconic Skyline with RB26DETT engine.",
    image: "https://media.carsandbids.com/cdn-cgi/image/width=2080,quality=70/da4b9237bacccdf19c0760cab7aec4a8359010b0/photos/KPLJWa27-5I0Zx9EbPT2-2-5-UkftLCYi.jpg?w=600&h=400&fit=crop",
    price: "$65,000",
    year: "1998-2002",
    engine: "RB26DETT 2.6L Twin-Turbo",
    horsepower: "320 HP",
    weight: "1,380 kg",
    fullDesc: "The R34 V-Spec is the ultimate street and track weapon. With its legendary RB26 engine, advanced AWD system, and four-wheel steering, it dominates both straight lines and corners. An icon that defined an era."
  },
  {
    id: 3,
    name: "Lancer Evo X",
    shortDesc: "Turbo AWD beast with rally heritage.",
    image: "https://ig-model.online/cdn/shop/products/3210-1_1024x1024@2x.jpg?v=1671978414?w=600&h=400&fit=crop",
    price: "$55,000",
    year: "2007-2015",
    engine: "4B11T 2.0L Twin-Turbo",
    horsepower: "291 HP",
    weight: "1,500 kg",
    fullDesc: "The Lancer Evo X carries on rally racing DNA with aggressive performance. Its turbocharged engine, cutting-edge AWD system, and super-responsive handling make it a formidable competitor on any surface."
  },
  {
    id: 4,
    name: "Mazda RX-7",
    shortDesc: "Rotary-powered masterpiece.",
    image: "https://www.jdmbuysell.com/wp-content/uploads/2023/07/mazda-rx-7-fd.jpg?w=600&h=400&fit=crop",
    price: "$40,000",
    year: "1991-2002",
    engine: "13B-REW Rotary 1.3L Twin-Turbo",
    horsepower: "280 HP",
    weight: "1,230 kg",
    fullDesc: "The RX-7 is a rotary-powered masterpiece with unique engineering. Its characteristic high-revving rotary engine, lightweight chassis, and perfect 50/50 weight distribution create an unforgettable driving experience."
  },
  {
    id: 5,
    name: "Toyota Supra MK4",
    shortDesc: "2JZ engine, tuning icon.",
    image: "https://carro.co/my/blog/wp-content/uploads/2022/01/mk4.jpg?w=600&h=400&fit=crop",
    price: "$70,000",
    year: "1993-2002",
    engine: "2JZ-GTE 3.0L Twin-Turbo",
    horsepower: "320 HP (Stock)",
    weight: "1,495 kg",
    fullDesc: "The Supra MK4 is the ultimate tuning platform and Hollywood legend. The indestructible 2JZ engine can handle massive power figures, making it the choice for serious builders. Iconic, powerful, and endlessly modifiable."
  },
  {
    id: 6,
    name: "Nissan Silvia S15",
    shortDesc: "Drift king with sleek design.",
    image: "https://toprankglobal.jp/picture/vehicle/95776_45.jpg?w=600&h=400&fit=crop",
    price: "$35,000",
    year: "1999-2002",
    engine: "SR20DET 2.0L Turbo",
    horsepower: "250 HP",
    weight: "1,200 kg",
    fullDesc: "The Silvia S15 is the last and greatest of the Silvia line. With its SR20DET turbo engine, perfect balance, and iconic styling, it became the preferred choice for drifters worldwide. Affordable, reliable, and endlessly fun."
  }
];

// Navigate to detail page
function viewDetails(carId) {
  window.location.href = "detail.htm?car=" + carId;
}

// Get car data from URL parameter
function getCarFromURL() {
  const params = new URLSearchParams(window.location.search);
  const carId = parseInt(params.get("car"));
  return cars.find(car => car.id === carId);
}