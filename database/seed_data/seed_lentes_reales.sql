-- =============================================
-- SEEDER: Datos reales de lentes para tienda
-- Tablas: categorias, productos, proveedores, sucursals, lotes, inventario, compras
-- =============================================

SET FOREIGN_KEY_CHECKS=0;

-- =============================================
-- 1. CATEGORÍAS
-- =============================================
INSERT INTO categorias (nombre, descripcion, created_at, updated_at) VALUES
('Lentes de Sol', 'Gafas de sol para protección UV y estilo', NOW(), NOW()),
('Lentes Oftálmicos', 'Lentes graduados para corrección visual', NOW(), NOW()),
('Lentes Deportivos', 'Gafas diseñadas para actividades deportivas', NOW(), NOW()),
('Lentes de Lectura', 'Lentes para presbicia y lectura cercana', NOW(), NOW()),
('Lentes de Seguridad', 'Gafas de protección industrial y laboral', NOW(), NOW()),
('Lentes para Niños', 'Armazones diseñados para niños', NOW(), NOW()),
('Lentes de Moda', 'Armazones de diseñador y alta costura', NOW(), NOW()),
('Lentes Blue Light', 'Protección contra luz azul de pantallas', NOW(), NOW()),
('Lentes Fotocromáticos', 'Lentes que se oscurecen con la luz solar', NOW(), NOW()),
('Lentes Polarizados', 'Lentes con filtro polarizado para reducir reflejos', NOW(), NOW());

-- =============================================
-- 2. PROVEEDORES
-- =============================================
INSERT INTO proveedors (empresa, direccion, nombre, telefono, email, created_at, updated_at) VALUES
('Luxottica México', 'Av. Insurgentes Sur 1234, CDMX', 'Carlos Mendoza', '+52 55 1234 5678', 'ventas@luxottica.mx', NOW(), NOW()),
('Essilor México', 'Blvd. Manuel Ávila 567, Guadalajara', 'María Fernanda López', '+52 33 9876 5432', 'contacto@essilor.mx', NOW(), NOW()),
('Óptica Central SA', 'Calle Morelos 890, Monterrey', 'Roberto Hernández', '+52 81 5555 1234', 'pedidos@opticacentral.com', NOW(), NOW()),
('Carl Zeiss Vision', 'Av. Universidad 456, Querétaro', 'Ana Patricia Ruiz', '+52 442 123 4567', 'ventas@zeiss-vision.mx', NOW(), NOW()),
('HOYA Lens México', 'Paseo de la Reforma 321, CDMX', 'Jorge Alberto Silva', '+52 55 8765 4321', 'info@hoyalens.mx', NOW(), NOW()),
('Safilo Group', 'Av. Constitución 789, Puebla', 'Laura Martínez', '+52 222 345 6789', 'mexico@safilo.com', NOW(), NOW()),
('Marchon Eyewear', 'Blvd. Kukulcán Km 12, Cancún', 'Diego Ramírez Torres', '+52 998 123 4567', 'ventas@marchon.com', NOW(), NOW()),
('De Rigo Vision', 'Av. Patria 1234, Guadalajara', 'Sofía Castillo', '+52 33 2222 3333', 'info@derigo.mx', NOW(), NOW());

-- =============================================
-- 3. SUCURSALES
-- =============================================
INSERT INTO sucursals (nombre, direccion, telefono, activa, created_at, updated_at) VALUES
('Sucursal Centro', 'Av. Juárez 456, Centro Histórico', '+52 55 1111 2222', 1, NOW(), NOW()),
('Sucursal Norte', 'Plaza Norte, Loc. 12, Av. Central 890', '+52 55 3333 4444', 1, NOW(), NOW()),
('Sucursal Sur', 'Centro Comercial Sur, Local 5', '+52 55 5555 6666', 1, NOW(), NOW()),
('Sucursal Plaza Galerías', 'Blvd. Galerías 234, Local 78', '+52 55 7777 8888', 1, NOW(), NOW());

-- =============================================
-- 4. PRODUCTOS - LENTES DE SOL (Categoría 1)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(1, 'SOL-001', 'Ray-Ban Aviator Classic RB3025', 'Lentes de sol estilo aviador con marco dorado y lentes verdes cristal. Protección UV 100%.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 1200.00, 2499.00, 5, 20, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-002', 'Ray-Ban Wayfarer Original RB2140', 'Icónico diseño Wayfarer con marco acetato negro y lentes verdes. Protección UV completa.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 1100.00, 2299.00, 5, 20, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-003', 'Oakley Holbrook OO9102', 'Lentes de sol deportivos con marco de nailon inyectado y lentes polarizadas. Tecnología Prizm.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 1500.00, 3199.00, 3, 15, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-004', 'Tom Ford FT0237 Snowdon', 'Armazón cuadrado de acetato con puente dorado. Elegancia y sofisticación.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 2800.00, 5499.00, 2, 10, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-005', 'Gucci GG0061S', 'Lentes de sol oversized con marco acetato negro y logo dorado. Estilo italiano.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 3200.00, 6299.00, 2, 10, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-006', 'Prada PR 17WS', 'Diseño femenino con detalles de cristal en las patillas. Lentes degradadas.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 2600.00, 4999.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-007', 'Dior DiorSoReal', 'Diseño vanguardista con puente abierto y lentes reflectantes. Alta moda.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 3500.00, 6999.00, 2, 8, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-008', 'Versace VE4361', 'Medusa dorada en las patillas. Marco geométrico con lentes degradadas.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 2900.00, 5699.00, 2, 10, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-009', 'Polaroid PLD 2061/S', 'Lentes polarizadas con protección UV400. Diseño clásico redondo.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 800.00, 1599.00, 8, 30, 'unidad', 1, NOW(), NOW()),
(1, 'SOL-010', 'Carrera Champion DL', 'Estilo retro con doble puente. Lentes espejadas con protección UV.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 900.00, 1799.00, 6, 25, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 5. PRODUCTOS - LENTES OFTÁLMICOS (Categoría 2)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(2, 'OFT-001', 'Ray-Ban RX5154 Clubmaster', 'Armazón clásico browline en acetato y metal. Perfecto para uso diario.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 1300.00, 2799.00, 5, 20, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-002', 'Oakley Crosslink OX8027', 'Marco de O-Matter ultraligero con bisagras de resorte. Resistente y cómodo.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 1600.00, 3399.00, 4, 15, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-003', 'Tom Ford FT5403', 'Armazón rectangular de acetato con detalles metálicos. Elegancia profesional.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 2500.00, 4999.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-004', 'Gucci GG0326O', 'Diseño geométrico con logo GG en las patillas. Tendencia y estilo.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 3000.00, 5999.00, 2, 10, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-005', 'Prada PR 01OVA', 'Armazón ovalado con charms metálicos. Feminidad y distinción.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 2700.00, 5299.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-006', 'Armani AR7131', 'Marco redondo de metal ligero. Minimalismo y elegancia italiana.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 1800.00, 3599.00, 4, 15, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-007', 'Vogue VO5219', 'Armazón cat-eye con detalles de cristal. Diseño juvenil y moderno.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 1200.00, 2499.00, 5, 20, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-008', 'Michael Kors MK4060', 'Estilo aviador adaptado para uso oftálmico. Metal dorado con lentes claros.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 1900.00, 3899.00, 4, 15, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-009', 'Bulgari BV1082', 'Diseño sofisticado con detalles de joyería. Lujo italiano.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 3500.00, 6999.00, 2, 8, 'unidad', 1, NOW(), NOW()),
(2, 'OFT-010', 'Tiffany TF1151B', 'Armazón de gato con azul Tiffany y detalles de cristal. Exclusividad.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 3200.00, 6299.00, 2, 10, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 6. PRODUCTOS - LENTES DEPORTIVOS (Categoría 3)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(3, 'DEP-001', 'Oakley Flak 2.0 XL OO9188', 'Lentes deportivos con lentes intercambiables. Tecnología Prizm para ciclismo.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 2200.00, 4499.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(3, 'DEP-002', 'Oakley Radar EV Path OO9208', 'Diseño envolvente para running y ciclismo. Máxima cobertura y ventilación.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 2400.00, 4899.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(3, 'DEP-003', 'Rudy Project Spinshield', 'Escudo de viento con lentes fotocromáticos. Ideal para ciclismo de montaña.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 2800.00, 5599.00, 2, 10, 'unidad', 1, NOW(), NOW()),
(3, 'DEP-004', 'Nike Vision Evolve Pro', 'Lentes deportivos con marco de nailon y lentes de policarbonato. Ligeros y resistentes.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 1800.00, 3599.00, 4, 15, 'unidad', 1, NOW(), NOW()),
(3, 'DEP-005', 'Under Armour Igniter 2.0', 'Protección total con lentes polarizadas. Diseño agresivo para alto rendimiento.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 1600.00, 3299.00, 4, 15, 'unidad', 1, NOW(), NOW()),
(3, 'DEP-006', 'Adidas Sport Performance SP0017', 'Lentes deportivos con tecnología de ventilación. Protección antiempañante.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 1500.00, 2999.00, 5, 18, 'unidad', 1, NOW(), NOW()),
(3, 'DEP-007', '100% Speedcraft', 'Lentes envolventes para ciclismo y running. Lentes intercambiables incluidos.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 2000.00, 3999.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(3, 'DEP-008', 'POC Crave Sport', 'Diseño escandinavo minimalista. Ultraligeros con ajuste ergonómico.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 2100.00, 4199.00, 3, 10, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 7. PRODUCTOS - LENTES DE LECTURA (Categoría 4)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(4, 'LEC-001', 'Foster Grant Classic Reader', 'Lentes de lectura clásicos con aumento +1.00 a +3.00. Marco de acetato.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 300.00, 699.00, 10, 40, 'unidad', 1, NOW(), NOW()),
(4, 'LEC-002', 'Peepers Blue Light Readers', 'Lentes de lectura con filtro de luz azul. Protección para lectura en pantalla.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 400.00, 899.00, 8, 35, 'unidad', 1, NOW(), NOW()),
(4, 'LEC-003', 'Reading Partners Magnify', 'Lentes de aumento con marco rectangular. Incluye estuche protector.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 350.00, 799.00, 10, 40, 'unidad', 1, NOW(), NOW()),
(4, 'LEC-004', 'Specs Readers Folding', 'Lentes de lectura plegables con estuche compacto. Perfectos para llevar.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 450.00, 999.00, 8, 30, 'unidad', 1, NOW(), NOW()),
(4, 'LEC-005', 'Eyegic Readers Slim', 'Diseño ultradelgado con bisagras flexibles. Comodidad prolongada.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 380.00, 849.00, 10, 35, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 8. PRODUCTOS - LENTES DE SEGURIDAD (Categoría 5)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(5, 'SEG-001', '3M SecureFit 400', 'Lentes de seguridad con tecnología de presión autoajustable. Protección UV.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 250.00, 549.00, 15, 60, 'unidad', 1, NOW(), NOW()),
(5, 'SEG-002', 'Honeywell Uvex Genesis', 'Protección contra impactos con lentes de policarbonato. Ventilación indirecta.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 280.00, 599.00, 12, 50, 'unidad', 1, NOW(), NOW()),
(5, 'SEG-003', 'DeWalt DPG82-11', 'Lentes de seguridad con sello de espuma para mayor protección. Antiempañante.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 320.00, 699.00, 10, 45, 'unidad', 1, NOW(), NOW()),
(5, 'SEG-004', '3M Virtua CCS+', 'Lentes de seguridad envolventes con protección lateral. Ligeros y cómodos.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 200.00, 449.00, 15, 60, 'unidad', 1, NOW(), NOW()),
(5, 'SEG-005', 'MCR Safety T110', 'Marco de nailon con lentes de policarbonato. Cumple norma ANSI Z87.1.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 230.00, 499.00, 12, 50, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 9. PRODUCTOS - LENTES PARA NIÑOS (Categoría 6)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(6, 'NIN-001', 'Ray-Ban Junior RJ9001S', 'Lentes de sol para niños con protección UV. Marco flexible y resistente.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 800.00, 1599.00, 8, 30, 'unidad', 1, NOW(), NOW()),
(6, 'NIN-002', 'Nike Vision SK001', 'Armazón deportivo para niños. Material resistente a impactos.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 900.00, 1899.00, 6, 25, 'unidad', 1, NOW(), NOW()),
(6, 'NIN-003', 'Chicco CH0010', 'Lentes oftálmicos para niños pequeños. Marco de silicona hipoalergénica.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 600.00, 1299.00, 10, 35, 'unidad', 1, NOW(), NOW()),
(6, 'NIN-004', 'Tommy Hilfiger TH 0012', 'Diseño divertido con colores vibrantes. Resistente y cómodo.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 700.00, 1499.00, 8, 30, 'unidad', 1, NOW(), NOW()),
(6, 'NIN-005', 'Polaroid Kids PLD 8017', 'Lentes de sol polarizados para niños. Protección UV total.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 650.00, 1399.00, 8, 30, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 10. PRODUCTOS - LENTES DE MODA (Categoría 7)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(7, 'MOD-001', 'Chanel CH5423', 'Lentes cat-eye con cadena de perlas en las patillas. Alta costura francesa.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 5500.00, 10999.00, 1, 5, 'unidad', 1, NOW(), NOW()),
(7, 'MOD-002', 'Dior CD1DIORCAT', 'Diseño cat-eye futurista con logo Dior. Puro glamour.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 5000.00, 9999.00, 1, 5, 'unidad', 1, NOW(), NOW()),
(7, 'MOD-003', 'Fendi FF 0359/S', 'Armazón oversized con logo Fendi en dorado. Estilo italiano de lujo.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 4200.00, 8499.00, 2, 8, 'unidad', 1, NOW(), NOW()),
(7, 'MOD-004', 'Balenciaga BB0101S', 'Diseño vanguardista con formas geométricas. Moda avant-garde.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 4800.00, 9599.00, 1, 5, 'unidad', 1, NOW(), NOW()),
(7, 'MOD-005', 'Saint Laurent SL M106', 'Aviador moderno con acabado dorado. Elegancia parisina.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 4500.00, 8999.00, 2, 8, 'unidad', 1, NOW(), NOW()),
(7, 'MOD-006', 'Burberry BE4245', 'Estilo británico con detalle de cuadro en las patillas. Clásico y moderno.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 3800.00, 7599.00, 2, 8, 'unidad', 1, NOW(), NOW()),
(7, 'MOD-007', 'Dolce & Gabbana DG4332', 'Diseño floral con cristales incrustados. Artesanía italiana.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 4000.00, 7999.00, 2, 8, 'unidad', 1, NOW(), NOW()),
(7, 'MOD-008', 'Calvin Klein CK21703S', 'Minimalismo moderno con líneas limpias. Diseño contemporáneo.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 2500.00, 4999.00, 3, 12, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 11. PRODUCTOS - LENTES BLUE LIGHT (Categoría 8)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(8, 'BLU-001', 'GUNNER Optiks Atlas', 'Lentes anti luz azul para gamers. Diseño angular y protección avanzada.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 1200.00, 2499.00, 5, 20, 'unidad', 1, NOW(), NOW()),
(8, 'BLU-002', 'JINS Screen UV Cut', 'Lentes japoneses con filtro de luz azul y UV. Diseño minimalista.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 900.00, 1899.00, 8, 30, 'unidad', 1, NOW(), NOW()),
(8, 'BLU-003', 'I-Optics Blue Shield', 'Protección contra luz azul de computadoras y tablets. Marco rectangular.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 700.00, 1499.00, 10, 35, 'unidad', 1, NOW(), NOW()),
(8, 'BLU-004', 'Cyxus Blue Light Blocking', 'Lentes de bloqueo de luz azul con marco de TR90 ultraligero.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 600.00, 1299.00, 10, 40, 'unidad', 1, NOW(), NOW()),
(8, 'BLU-005', 'Livho Blue Light Glasses', 'Lentes de computadora con diseño redondo. Protección 400nm.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 500.00, 1099.00, 12, 45, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 12. PRODUCTOS - LENTES FOTOCROMÁTICOS (Categoría 9)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(9, 'FOT-001', 'Transitions Gen S', 'Lentes fotocromáticos que se oscurecen en 30 segundos. Protección UV total.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 1800.00, 3599.00, 5, 20, 'unidad', 1, NOW(), NOW()),
(9, 'FOT-002', 'Ray-Ban RB3445 Chromance', 'Aviador con lentes fotocromáticos Chromance. Adaptación rápida a la luz.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 2500.00, 4999.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(9, 'FOT-003', 'Oakley OO6356 Crosslink', 'Lentes fotocromáticos con tecnología Transitions. Marco de O-Matter.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 2200.00, 4399.00, 4, 15, 'unidad', 1, NOW(), NOW()),
(9, 'FOT-004', 'Essilor Transitions VII', 'Lentes oftálmicos con tecnología Transitions Signature. 7ma generación.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 1500.00, 2999.00, 6, 25, 'unidad', 1, NOW(), NOW()),
(9, 'FOT-005', 'Zeiss PhotoFusion X', 'Fotocromáticos de alta velocidad con tecnología Carl Zeiss. Claridad superior.', 'https://images.unsplash.com/photo-1577803645773-f96470509668', 2000.00, 3999.00, 4, 15, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 13. PRODUCTOS - LENTES POLARIZADOS (Categoría 10)
-- =============================================
INSERT INTO productos (categoria_id, codigo, nombre, descripcion, imagen, precio_compra, precio_venta, stock_minimo, stock_maximo, unidad_medida, estado, created_at, updated_at) VALUES
(10, 'POL-001', 'Maui Jim Hookipa', 'Lentes polarizados premium con protección contra reflejos de agua. Hawaii.', 'https://images.unsplash.com/photo-1508296695146-257a814070b4', 2800.00, 5599.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(10, 'POL-002', 'Costa Del Mar Fantail', 'Polarizados para pesca y actividades acuáticas. Lentes de vidrio.', 'https://images.unsplash.com/photo-1556015048-4d3aa1557515', 2400.00, 4799.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(10, 'POL-003', 'Serengeti Cervino', 'Lentes polarizados fotocromáticos. Tecnología patentada de ajuste de color.', 'https://images.unsplash.com/photo-1572635196237-14b3f281503f', 3200.00, 6399.00, 2, 10, 'unidad', 1, NOW(), NOW()),
(10, 'POL-004', 'Randolph Aviator Polarized', 'Aviador clásico americano con lentes polarizadas. Calidad militar.', 'https://images.unsplash.com/photo-1511499767150-a48a237f0083', 2600.00, 5199.00, 3, 12, 'unidad', 1, NOW(), NOW()),
(10, 'POL-005', 'VonZipper Fishbone Polar', 'Estilo retro con lentes polarizadas. Marco de acetato italiano.', 'https://images.unsplash.com/photo-1574258495943-5f0b5c3d0c0c', 1800.00, 3599.00, 4, 15, 'unidad', 1, NOW(), NOW()),
(10, 'POL-006', 'Electric Visual Knoxville', 'Polarizados con tecnología de lente Switch. Diseño urbano moderno.', 'https://images.unsplash.com/photo-1591076482161-42ce6da6f667', 1600.00, 3199.00, 5, 18, 'unidad', 1, NOW(), NOW());

-- =============================================
-- 14. LOTES (Entrada inicial de inventario)
-- =============================================
INSERT INTO lotes (producto_id, proveedor_id, codigo_lote, fecha_entrada, fecha_vencimiento, cantidad_inicial, cantidad_actual, precio_compra, precio_venta, estado, created_at, updated_at) VALUES
-- Lentes de Sol
(1, 1, 'LOT-SOL-001-2026A', '2026-04-01', NULL, 10, 10, 1200.00, 2499.00, 1, NOW(), NOW()),
(2, 1, 'LOT-SOL-002-2026A', '2026-04-01', NULL, 10, 10, 1100.00, 2299.00, 1, NOW(), NOW()),
(3, 1, 'LOT-SOL-003-2026A', '2026-04-05', NULL, 8, 8, 1500.00, 3199.00, 1, NOW(), NOW()),
(4, 6, 'LOT-SOL-004-2026A', '2026-04-10', NULL, 5, 5, 2800.00, 5499.00, 1, NOW(), NOW()),
(5, 6, 'LOT-SOL-005-2026A', '2026-04-10', NULL, 5, 5, 3200.00, 6299.00, 1, NOW(), NOW()),
(9, 5, 'LOT-SOL-009-2026A', '2026-04-12', NULL, 20, 20, 800.00, 1599.00, 1, NOW(), NOW()),
(10, 5, 'LOT-SOL-010-2026A', '2026-04-12', NULL, 15, 15, 900.00, 1799.00, 1, NOW(), NOW()),
-- Lentes Oftálmicos
(11, 1, 'LOT-OFT-001-2026A', '2026-04-01', NULL, 10, 10, 1300.00, 2799.00, 1, NOW(), NOW()),
(12, 1, 'LOT-OFT-002-2026A', '2026-04-05', NULL, 8, 8, 1600.00, 3399.00, 1, NOW(), NOW()),
(13, 6, 'LOT-OFT-003-2026A', '2026-04-10', NULL, 5, 5, 2500.00, 4999.00, 1, NOW(), NOW()),
(16, 7, 'LOT-OFT-006-2026A', '2026-04-12', NULL, 10, 10, 1800.00, 3599.00, 1, NOW(), NOW()),
(17, 7, 'LOT-OFT-007-2026A', '2026-04-12', NULL, 12, 12, 1200.00, 2499.00, 1, NOW(), NOW()),
-- Lentes Deportivos
(21, 1, 'LOT-DEP-001-2026A', '2026-04-05', NULL, 6, 6, 2200.00, 4499.00, 1, NOW(), NOW()),
(22, 1, 'LOT-DEP-002-2026A', '2026-04-05', NULL, 6, 6, 2400.00, 4899.00, 1, NOW(), NOW()),
(24, 4, 'LOT-DEP-004-2026A', '2026-04-10', NULL, 8, 8, 1800.00, 3599.00, 1, NOW(), NOW()),
-- Lentes de Lectura
(29, 2, 'LOT-LEC-001-2026A', '2026-04-01', NULL, 30, 30, 300.00, 699.00, 1, NOW(), NOW()),
(30, 2, 'LOT-LEC-002-2026A', '2026-04-01', NULL, 25, 25, 400.00, 899.00, 1, NOW(), NOW()),
(31, 2, 'LOT-LEC-003-2026A', '2026-04-01', NULL, 30, 30, 350.00, 799.00, 1, NOW(), NOW()),
-- Lentes de Seguridad
(34, 3, 'LOT-SEG-001-2026A', '2026-04-01', NULL, 40, 40, 250.00, 549.00, 1, NOW(), NOW()),
(35, 3, 'LOT-SEG-002-2026A', '2026-04-01', NULL, 35, 35, 280.00, 599.00, 1, NOW(), NOW()),
(36, 3, 'LOT-SEG-003-2026A', '2026-04-05', NULL, 30, 30, 320.00, 699.00, 1, NOW(), NOW()),
-- Lentes para Niños
(39, 7, 'LOT-NIN-001-2026A', '2026-04-05', NULL, 20, 20, 800.00, 1599.00, 1, NOW(), NOW()),
(40, 4, 'LOT-NIN-002-2026A', '2026-04-10', NULL, 15, 15, 900.00, 1899.00, 1, NOW(), NOW()),
-- Lentes de Moda
(44, 6, 'LOT-MOD-001-2026A', '2026-04-10', NULL, 3, 3, 5500.00, 10999.00, 1, NOW(), NOW()),
(45, 8, 'LOT-MOD-002-2026A', '2026-04-12', NULL, 3, 3, 5000.00, 9999.00, 1, NOW(), NOW()),
(48, 8, 'LOT-MOD-005-2026A', '2026-04-12', NULL, 5, 5, 4500.00, 8999.00, 1, NOW(), NOW()),
-- Lentes Blue Light
(52, 4, 'LOT-BLU-001-2026A', '2026-04-01', NULL, 15, 15, 1200.00, 2499.00, 1, NOW(), NOW()),
(53, 2, 'LOT-BLU-002-2026A', '2026-04-01', NULL, 20, 20, 900.00, 1899.00, 1, NOW(), NOW()),
(54, 2, 'LOT-BLU-003-2026A', '2026-04-05', NULL, 25, 25, 700.00, 1499.00, 1, NOW(), NOW()),
-- Lentes Fotocromáticos
(57, 2, 'LOT-FOT-001-2026A', '2026-04-05', NULL, 12, 12, 1800.00, 3599.00, 1, NOW(), NOW()),
(58, 1, 'LOT-FOT-002-2026A', '2026-04-10', NULL, 8, 8, 2500.00, 4999.00, 1, NOW(), NOW()),
(60, 2, 'LOT-FOT-004-2026A', '2026-04-12', NULL, 15, 15, 1500.00, 2999.00, 1, NOW(), NOW()),
-- Lentes Polarizados
(61, 5, 'LOT-POL-001-2026A', '2026-04-05', NULL, 8, 8, 2800.00, 5599.00, 1, NOW(), NOW()),
(62, 5, 'LOT-POL-002-2026A', '2026-04-10', NULL, 8, 8, 2400.00, 4799.00, 1, NOW(), NOW()),
(64, 5, 'LOT-POL-004-2026A', '2026-04-12', NULL, 8, 8, 2600.00, 5199.00, 1, NOW(), NOW());

-- =============================================
-- 15. INVENTARIO SUCURSAL LOTES
-- =============================================
-- Distribuir lotes entre las 4 sucursales
INSERT INTO inventario_sucursal_lotes (lote_id, sucursal_id, cantidad_en_sucursal, created_at, updated_at) VALUES
-- Sucursal Centro (1) - recibe ~40% de cada lote
(1, 1, 4, NOW(), NOW()), (2, 1, 4, NOW(), NOW()), (3, 1, 3, NOW(), NOW()),
(4, 1, 2, NOW(), NOW()), (5, 1, 2, NOW(), NOW()), (6, 1, 8, NOW(), NOW()),
(7, 1, 6, NOW(), NOW()), (8, 1, 4, NOW(), NOW()), (9, 1, 3, NOW(), NOW()),
(10, 1, 2, NOW(), NOW()), (11, 1, 4, NOW(), NOW()), (12, 1, 5, NOW(), NOW()),
(13, 1, 2, NOW(), NOW()), (14, 1, 2, NOW(), NOW()), (15, 1, 3, NOW(), NOW()),
(16, 1, 12, NOW(), NOW()), (17, 1, 10, NOW(), NOW()), (18, 1, 12, NOW(), NOW()),
(19, 1, 16, NOW(), NOW()), (20, 1, 14, NOW(), NOW()), (21, 1, 12, NOW(), NOW()),
(22, 1, 8, NOW(), NOW()), (23, 1, 6, NOW(), NOW()), (24, 1, 1, NOW(), NOW()),
(25, 1, 1, NOW(), NOW()), (26, 1, 2, NOW(), NOW()), (27, 1, 6, NOW(), NOW()),
(28, 1, 8, NOW(), NOW()), (29, 1, 10, NOW(), NOW()), (30, 1, 5, NOW(), NOW()),
(31, 1, 3, NOW(), NOW()), (32, 1, 6, NOW(), NOW()), (33, 1, 3, NOW(), NOW()),
(34, 1, 3, NOW(), NOW()), (35, 1, 3, NOW(), NOW()),

-- Sucursal Norte (2) - recibe ~25%
(1, 2, 3, NOW(), NOW()), (2, 2, 2, NOW(), NOW()), (3, 2, 2, NOW(), NOW()),
(6, 2, 5, NOW(), NOW()), (7, 2, 4, NOW(), NOW()), (8, 2, 3, NOW(), NOW()),
(11, 2, 3, NOW(), NOW()), (12, 2, 3, NOW(), NOW()), (16, 2, 8, NOW(), NOW()),
(17, 2, 6, NOW(), NOW()), (19, 2, 10, NOW(), NOW()), (20, 2, 8, NOW(), NOW()),
(22, 2, 5, NOW(), NOW()), (23, 2, 4, NOW(), NOW()), (27, 2, 4, NOW(), NOW()),
(28, 2, 5, NOW(), NOW()), (30, 2, 4, NOW(), NOW()), (31, 2, 4, NOW(), NOW()),
(34, 2, 2, NOW(), NOW()), (35, 2, 2, NOW(), NOW()),

-- Sucursal Sur (3) - recibe ~20%
(1, 3, 2, NOW(), NOW()), (2, 3, 2, NOW(), NOW()), (6, 3, 4, NOW(), NOW()),
(7, 3, 3, NOW(), NOW()), (11, 3, 2, NOW(), NOW()), (16, 3, 6, NOW(), NOW()),
(17, 3, 5, NOW(), NOW()), (19, 3, 8, NOW(), NOW()), (20, 3, 6, NOW(), NOW()),
(22, 3, 4, NOW(), NOW()), (27, 3, 3, NOW(), NOW()), (28, 3, 4, NOW(), NOW()),
(30, 3, 3, NOW(), NOW()), (31, 3, 3, NOW(), NOW()), (34, 3, 2, NOW(), NOW()),

-- Sucursal Plaza Galerías (4) - recibe ~15%
(1, 4, 1, NOW(), NOW()), (2, 4, 2, NOW(), NOW()), (6, 4, 3, NOW(), NOW()),
(7, 4, 2, NOW(), NOW()), (11, 4, 2, NOW(), NOW()), (16, 4, 4, NOW(), NOW()),
(17, 4, 4, NOW(), NOW()), (19, 4, 6, NOW(), NOW()), (20, 4, 5, NOW(), NOW()),
(22, 4, 3, NOW(), NOW()), (27, 4, 2, NOW(), NOW()), (28, 4, 3, NOW(), NOW()),
(30, 4, 3, NOW(), NOW()), (31, 4, 2, NOW(), NOW()), (34, 4, 1, NOW(), NOW());

-- =============================================
-- 16. COMPRAS (Órdenes de compra iniciales)
-- =============================================
INSERT INTO compras (proveedor_id, user_id, fecha, total, estado, referencia, observaciones, created_at, updated_at) VALUES
(1, 1, '2026-04-01', 54200.00, 'completada', 'OC-2026-001', 'Compra inicial de lentes Ray-Ban y Oakley', NOW(), NOW()),
(6, 1, '2026-04-10', 48500.00, 'completada', 'OC-2026-002', 'Compra de lentes de moda: Gucci, Prada, Tom Ford', NOW(), NOW()),
(2, 1, '2026-04-01', 22800.00, 'completada', 'OC-2026-003', 'Compra de lentes de lectura y blue light', NOW(), NOW()),
(3, 1, '2026-04-01', 18600.00, 'completada', 'OC-2026-004', 'Compra de lentes de seguridad industriales', NOW(), NOW()),
(5, 1, '2026-04-12', 36400.00, 'completada', 'OC-2026-005', 'Compra de lentes polarizados y básicos', NOW(), NOW()),
(7, 1, '2026-04-05', 28000.00, 'completada', 'OC-2026-006', 'Compra de lentes deportivos y para niños', NOW(), NOW());

-- =============================================
-- 17. DETALLE COMPRAS (Productos por orden de compra)
-- =============================================
INSERT INTO detalle_compras (compra_id, producto_id, lote_id, precio_unitario, cantidad, subtotal, created_at, updated_at) VALUES
-- Compra OC-2026-001 (Luxottica - Ray-Ban y Oakley)
(1, 1, 1, 1200.00, 10, 12000.00, NOW(), NOW()),
(1, 2, 2, 1100.00, 10, 11000.00, NOW(), NOW()),
(1, 3, 3, 1500.00, 8, 12000.00, NOW(), NOW()),
(1, 11, 8, 1300.00, 10, 13000.00, NOW(), NOW()),
(1, 12, 9, 1600.00, 8, 12800.00, NOW(), NOW()),

-- Compra OC-2026-002 (Safilo - Moda)
(2, 4, 4, 2800.00, 5, 14000.00, NOW(), NOW()),
(2, 5, 5, 3200.00, 5, 16000.00, NOW(), NOW()),
(2, 13, 10, 2500.00, 5, 12500.00, NOW(), NOW()),
(2, 44, 24, 5500.00, 3, 16500.00, NOW(), NOW()),

-- Compra OC-2026-003 (Essilor - Lectura y Blue Light)
(3, 29, 16, 300.00, 30, 9000.00, NOW(), NOW()),
(3, 30, 17, 400.00, 25, 10000.00, NOW(), NOW()),
(3, 53, 28, 900.00, 20, 18000.00, NOW(), NOW()),

-- Compra OC-2026-004 (Óptica Central - Seguridad)
(4, 34, 19, 250.00, 40, 10000.00, NOW(), NOW()),
(4, 35, 20, 280.00, 35, 9800.00, NOW(), NOW()),

-- Compra OC-2026-005 (HOYA - Polarizados y básicos)
(5, 9, 6, 800.00, 20, 16000.00, NOW(), NOW()),
(5, 10, 7, 900.00, 15, 13500.00, NOW(), NOW()),
(5, 57, 30, 1800.00, 12, 21600.00, NOW(), NOW()),

-- Compra OC-2026-006 (Marchon - Deportivos y Niños)
(6, 21, 13, 2200.00, 6, 13200.00, NOW(), NOW()),
(6, 22, 14, 2400.00, 6, 14400.00, NOW(), NOW()),
(6, 39, 22, 800.00, 20, 16000.00, NOW(), NOW());

-- =============================================
-- 18. MOVIMIENTOS DE INVENTARIO (Registros iniciales)
-- =============================================
INSERT INTO movimiento_inventarios (producto_id, lote_id, sucursal_id, tipo_movimiento, cantidad, fecha, observaciones, created_at, updated_at) VALUES
-- Entradas iniciales por compra
(1, 1, 1, 'entrada', 4, '2026-04-01', 'Entrada inicial por OC-2026-001', NOW(), NOW()),
(2, 2, 1, 'entrada', 4, '2026-04-01', 'Entrada inicial por OC-2026-001', NOW(), NOW()),
(3, 3, 1, 'entrada', 3, '2026-04-05', 'Entrada inicial por OC-2026-001', NOW(), NOW()),
(29, 16, 1, 'entrada', 12, '2026-04-01', 'Entrada inicial por OC-2026-003', NOW(), NOW()),
(34, 19, 1, 'entrada', 16, '2026-04-01', 'Entrada inicial por OC-2026-004', NOW(), NOW()),
(9, 6, 1, 'entrada', 8, '2026-04-12', 'Entrada inicial por OC-2026-005', NOW(), NOW()),
(21, 13, 1, 'entrada', 2, '2026-04-05', 'Entrada inicial por OC-2026-006', NOW(), NOW()),
(39, 22, 1, 'entrada', 8, '2026-04-05', 'Entrada inicial por OC-2026-006', NOW(), NOW()),

-- Sucursal Norte
(1, 1, 2, 'entrada', 3, '2026-04-01', 'Entrada inicial por OC-2026-001', NOW(), NOW()),
(29, 16, 2, 'entrada', 8, '2026-04-01', 'Entrada inicial por OC-2026-003', NOW(), NOW()),
(34, 19, 2, 'entrada', 10, '2026-04-01', 'Entrada inicial por OC-2026-004', NOW(), NOW()),

-- Sucursal Sur
(1, 1, 3, 'entrada', 2, '2026-04-01', 'Entrada inicial por OC-2026-001', NOW(), NOW()),
(29, 16, 3, 'entrada', 6, '2026-04-01', 'Entrada inicial por OC-2026-003', NOW(), NOW()),

-- Sucursal Plaza Galerías
(1, 1, 4, 'entrada', 1, '2026-04-01', 'Entrada inicial por OC-2026-001', NOW(), NOW()),
(29, 16, 4, 'entrada', 4, '2026-04-01', 'Entrada inicial por OC-2026-003', NOW(), NOW());

SET FOREIGN_KEY_CHECKS=1;

-- =============================================
-- RESUMEN DE DATOS INSERTADOS
-- =============================================
-- Categorías: 10
-- Proveedores: 8
-- Sucursales: 4
-- Productos: 66 (lentes reales de marcas reconocidas)
-- Lotes: 35
-- Inventario Sucursal Lotes: ~105 registros
-- Compras: 6
-- Detalle Compras: 20
-- Movimientos Inventario: 16
-- =============================================
