-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2021 at 01:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ley482`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id`, `nombres`, `apellidos`, `cedula`, `password`, `created_at`, `updated_at`) VALUES
(200, 'Daniel Alejandro', 'Tutistar Urbina', '1085332911', '$2y$12$OtyMm0H4pAGNFbI4xdB5ZeYBdhbeKKt2zCPaxAPBvq5n1Q4ZlJ.K.', '2021-02-05 01:43:12', '2021-02-05 01:43:16'),
(300, 'Mateo', 'Luna Osorio', '215034243', '$2y$12$OtyMm0H4pAGNFbI4xdB5ZeYBdhbeKKt2zCPaxAPBvq5n1Q4ZlJ.K.', '2021-02-05 01:36:03', '2021-02-05 01:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

CREATE TABLE `articulos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `numero` int(11) NOT NULL,
  `id_capitulo` int(5) NOT NULL,
  `vistas` int(11) NOT NULL DEFAULT '0',
  `fecha_modificacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paragrafo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `contenido`, `numero`, `id_capitulo`, `vistas`, `fecha_modificacion`, `created_at`, `updated_at`, `paragrafo`) VALUES
(2, 'CONCEPTO DE INGENIERÍA.', 'Se entiende por ingeniería toda aplicación de las ciencias físicas, químicas y matemáticas; de la técnica industrial y en general, del ingenio humano, a la utilización e invención sobre la materia.', 1, 2, 0, '2021-01-07', NULL, NULL, 0),
(3, 'EJERCICIO DE LA INGENIERÍA.', 'Para los efectos de la presente ley, se entiende como ejercicio de la ingeniería, el desempeño de actividades tales como:<br><br>a) Los estudios, la planeación, el diseño, el cálculo, la programación, la asesoría, la consultoría, la interventoría, la construcción, el mantenimiento y la administración de construcciones de edificios y viviendas de toda índole, de puentes, presas, muelles, canales, puertos, carreteras, vías urbanas y rurales, aeropuertos, ferrocarriles, teleféricos, acueductos, alcantarillados, riesgos (sic), drenajes y pavimentos; oleoductos, gasoductos, poliductos y en general líneas de conducción y transporte de hidrocarburos; líneas de transmisión eléctrica y en general todas aquellas obras de infraestructura para el servicio de la comunidad;<br><br>b) Los estudios, proyectos, diseños y procesos industriales, textiles, electromecánicos, termoeléctricos, energéticos, mecánicos, eléctricos, electrónicos, de computación, de sistemas, teleinformáticos, agroindustriales, agronómicos, agrícolas, agrológicos, de alimentos, agrometeorológicos, ambientales, geofísicos, forestales, químicos, metalúrgicos, mineros, de petróleos, geológicos, geodésicos, geográficos, topográficos e hidrológicos;<br><br>c) La planeación del transporte aéreo, terrestre y náutico y en general, todo asunto relacionado con la ejecución o desarrollo de las tareas o actividades de las profesiones especificadas en los subgrupos 02 y 03 de la Clasificación Nacional de Ocupaciones o normas que la sustituyan o complementen, en cuanto a la ingeniería, sus profesiones afines y auxiliares se refiere. También se entiende por ejercicio de la profesión para los efectos de esta ley, el presentarse o anunciarse como ingeniero o acceder a un cargo de nivel profesional utilizando dicho título.<br><br>PARÁGRAFO. La instrucción, formación, enseñanza, docencia o cátedra dirigida a los estudiantes que aspiren a uno de los títulos profesionales, afines o auxiliares de la Ingeniería, en las materias o asignaturas que impliquen el conocimiento de la profesión, como máxima actividad del ejercicio profesional, solo podrá ser impartida por profesionales de la ingeniería, sus profesiones afines o sus profesiones auxiliares, según el caso, debidamente matriculados.', 2, 2, 0, '2021-01-07', NULL, NULL, 0),
(4, 'PROFESIONES AUXILIARES DE LA INGENIERÍA.', 'e entiende por Profesiones Auxiliares de la Ingeniería, aquellas actividades que se ejercen en nivel medio, como auxiliares de los ingenieros, amparadas por un título académico en las modalidades educativas de formación técnica y tecnológica profesional, conferido por instituciones de educación superior legalmente autorizadas, tales como: Técnicos y tecnólogos en obras civiles, técnicos y tecnólogos laboratoristas, técnicos y tecnólogos constructores, técnicos y tecnólogos en topografía, técnicos y tecnólogos en minas, técnicos y tecnólogos delineantes en ingeniería, técnicos y tecnólogos en sistemas o en computación, analistas de sistemas y programadores, técnicos y tecnólogos en alimentos, técnicos y tecnólogos industriales, técnicos y tecnólogos hidráulicos y sanitarios, técnicos y tecnólogos teleinformáticos, técnicos y tecnólogos agroindustriales y los maestros de obras de construcción en sus diversas modalidades, que demuestren una experiencia de más de diez (10) años en actividades de la construcción, mediante certificaciones expedidas por ingenieros y/o arquitectos debidamente matriculados y, excepcionalmente, por las autoridades de obras públicas y/o de planeación, municipales.', 3, 2, 0, '2021-01-07', NULL, NULL, 0),
(5, 'PROFESIONES AFINES.', 'Son profesiones afines a la ingeniería, aquellas que siendo del nivel profesional, su ejercicio se desarrolla en actividades relacionadas con la ingeniería en cualquiera de sus áreas, o cuyo campo ocupacional es conexo a la ingeniería, tales como: La Administración de Obras Civiles, la Construcción en Ingeniería y Arquitectura; la Administración de Sistemas de Información; la Administración Ambiental y de los Recursos Naturales, la Bioingeniería y la Administración en Informática, entre otras.<br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE.<br><br>', 4, 2, 0, '2021-01-07', NULL, NULL, 0),
(6, 'AMPLIACIÓN DE LA CLASIFICACIÓN NACIONAL DE OCUPACIONES.', 'En todo caso, el Consejo Profesional Nacional de Ingeniería, Copnia, podrá ampliar el alcance de las actividades a que se refiere la Clasificación Nacional de Ocupaciones en los Subgrupos 02 y 03 o norma que la sustituya o reforme, de acuerdo con las nuevas modalidades de los programas y títulos académicos en ingeniería y sus profesiones afines y auxiliares que se presenten en el país.<br><br>Nota: Sentencia C-191 de 2005. Corte Constitucional. El presente artículo fue declarado EXEQUIBLE de manera condicionada, en el entendido de que la facultad otorgada por la presente norma al COPNIA, tiene naturaleza exclusivamente técnica y no implica la posibilidad de agregar o excluir actividades a las que se refiere la clasificación nacional de ocupaciones en los subgrupos 02 y 03 o norma que la sustituya<br><br>Sentencia C-667 de 2005, Corte Constitucional. En relación con el presente artículo, la Corte Constitucional declaró estarse a lo resuelto en la Sentencia C-191 de 2005.', 5, 2, 0, '2021-01-07', NULL, NULL, 0),
(7, 'REQUISITOS PARA EJERCER LA PROFESIÓN.', 'Para poder ejercer legalmente la Ingeniería, sus profesiones afines o sus profesiones auxiliares en el territorio nacional, en las ramas o especialidades regidas por la presente ley, se requiere estar matriculado o inscrito en el Registro Profesional respectivo, que seguirá llevando el Copnia, lo cual se acreditará con la presentación de la tarjeta o documento adoptado por este para tal fin.<br><br>PARÁGRAFO. En los casos en que los contratantes del sector público o privado, o cualquier usuario de los servicios de ingeniería, pretendan establecer si un profesional se encuentra legalmente habilitado o no, para ejercer la profesión, podrán sin perjuicio de los requisitos establecidos en el presente artículo, requerir al Copnia la expedición del respectivo certificado de vigencia.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE en el entendido de que los profesionales de disciplinas relacionadas con la ingeniería que cuenten con consejos profesionales propios deberán inscribirse y obtener la matrícula ante estos consejos, después de pagar los derechos respectivos, mientras estos consejos no sean eliminados o modificados por el Legislador, a iniciativa del Gobierno', 6, 3, 0, '0000-00-00', NULL, NULL, 0),
(8, 'REQUISITOS PARA OBTENER LA MATRÍCULA Y LA TARJETA DE MATRÍCULA PROFESIONAL.', 'Sólo podrán ser matriculados en el Registro Profesional de Ingenieros y obtener tarjeta de matrícula profesional, para poder ejercer la profesión en el territorio nacional, quienes:<br><br>a) Hayan adquirido el título académico de Ingeniero en cualquiera de sus ramas, otorgado por Instituciones de Educación Superior oficialmente reconocidas, de acuerdo con las normas legales vigentes;<br><br>b) Hayan adquirido el título académico de Ingeniero en cualquiera de sus ramas, otorgado por Instituciones de Educación Superior que funcionen en países con los cuales Colombia haya celebrado tratados o convenios sobre reciprocidad de títulos, situación que debe ser avalada por el ICFES o por el organismo que se determine para tal efecto;<br><br>c) Hayan adquirido el título académico de Ingeniero en cualquiera de sus ramas, otorgado por Instituciones de Educación Superior que funcionen en países con los cuales Colombia no haya celebrado tratados o convenios sobre reciprocidad de títulos; siempre y cuando hayan obtenido la homologación o convalidación del título académico ante las autoridades competentes, conforme con las normas vigentes sobre la materia.<br><br>PARÁGRAFO 1o. Los títulos académicos de postgrado de los profesionales matriculados no serán susceptibles de inscripción en el registro profesional de ingeniería, por lo tanto, cuando se necesite acreditar tal calidad, bastará con la presentación del título de postgrado respectivo, debidamente otorgado por universidad o institución autorizada por el Estado para tal efecto. Si el título de postgrado fue otorgado en el exterior, solo se aceptará debidamente consularizado o apostillado de acuerdo con las normas que rigen la materia.<br><br>PARÁGRAFO 2o. La información que los profesionales aporten como requisitos de su inscripción en el registro profesional respectivo, solamente podrá ser utilizada por el Copnia para efectos del control y vigilancia del ejercicio profesional correspondiente, excepto cuando sea requerida por las demás autoridades de fiscalización y control para lo de su competencia o cuando medie orden judicial.', 7, 3, 0, '2021-01-07', NULL, NULL, 0),
(9, 'REQUISITOS PARA OBTENER EL CERTIFICADO DE INSCRIPCIÓN PROFESIONAL.', 'Sólo podrán ser matriculados en el Registro Profesional respectivo y obtener certificado de inscripción profesional y su respectiva tarjeta, para poder ejercer alguna de las profesiones afines o de las profesiones auxiliares de la ingeniería en el territorio nacional, quienes:<br><br>a) Hayan adquirido el título académico en alguna de sus profesiones afines o de las profesiones auxiliares de la ingeniería, otorgado por instituciones de Educación Superior oficialmente reconocidas, de acuerdo con las normas legales vigentes;<br><br>b) Hayan adquirido el título académico en alguna de las profesiones afines o de las profesiones auxiliares de la ingeniería, otorgado por instituciones de Educación Superior que funcionen en países con los cuales Colombia haya celebrado tratados o convenios sobre reciprocidad de títulos;<br><br>c) Hayan adquirido el título académico en alguna de las profesiones afines o de las profesiones auxiliares de la ingeniería, otorgado por instituciones de Educación Superior que funcionen en países con los cuales Colombia no haya celebrado tratados o convenios sobre reciprocidad de títulos; siempre y cuando hayan obtenido la homologación o convalidación del título académico ante las autoridades competentes, de acuerdo con las normas vigentes.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE por los cargos analizados.', 8, 3, 0, '2021-01-07', NULL, NULL, 0),
(10, 'PROCEDIMIENTO DE INSCRIPCIÓN Y MATRÍCULA.', 'Para obtener la matrícula profesional o el certificado de que trata la presente ley, el interesado deberá presentar ante el Consejo Profesional Seccional o Regional de ingeniería del domicilio de la Universidad o Institución que otorgó el título, el original correspondiente con su respectiva acta de grado, fotocopia del documento de identidad y el recibo de consignación de los derechos que para el efecto fije el Copnia.<br><br>Verificados los requisitos, el Seccional o Regional correspondiente, otorgará la matrícula o el certificado, según el caso, el cual deberá ser confirmado por el Consejo Nacional de Ingeniería en la sesión ordinaria siguiente a su recibo, ordenando la expedición del documento respectivo.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE en el entendido de que los profesionales de disciplinas relacionadas con la ingeniería que cuenten con consejos profesionales propios deberán inscribirse y obtener la Matrícula ante estos consejos, después de pagar los derechos respectivos, mientras estos Consejos no sean eliminados o modificados por el Legislador, a iniciativa del Gobierno', 9, 3, 0, '2021-01-07', NULL, NULL, 0),
(11, ' ', 'Para efectos de la inscripción o matrícula, toda Universidad o Institución de Educación Superior que otorgue títulos correspondientes a las profesiones aquí reglamentadas, deberá remitir de oficio o por requerimiento del Copnia, el listado de graduandos cada vez que este evento ocurra, tanto al Consejo Seccional o Regional de su domicilio, como al Consejo Nacional de Ingeniería, respectivamente.', 10, 3, 0, '2021-01-07', NULL, NULL, 0),
(12, 'POSESIÓN EN CARGOS, SUSCRIPCIÓN DE CONTRATOS O REALIZACIÓN DE DICTÁMENES TÉCNICOS QUE IMPLIQUEN EL E', 'Para poder tomar posesión de un cargo público o privado, en cuyo desempeño se requiera el conocimiento o el ejercicio de la ingeniería o de alguna de sus profesiones afines o auxiliares; para participar en licitaciones públicas o privadas cuyo objeto implique el ejercicio de la ingeniería en cualquiera de sus ramas; para suscribir contratos de ingeniería y para emitir dictámenes sobre aspectos técnicos de la ingeniería o de algunas de sus profesiones auxiliares ante organismos estatales o personas de carácter privado, jurídicas o naturales; para presentarse o utilizar el título de Ingeniero para acceder a cargos o desempeños cuyo requisito sea poseer un título profesional, se debe exigir la presentación, en original, del documento que acredita la inscripción o el registro profesional de que trata la presente ley.', 11, 3, 0, '2021-01-07', NULL, NULL, 0),
(13, 'EXPERIENCIA PROFESIONAL.', 'Para los efectos del ejercicio de la ingeniería o de alguna de sus profesiones afines o auxiliares, la experiencia profesional solo se computará a partir de la fecha de expedición de la matrícula profesional o del certificado de inscripción profesional, respectivamente. Todas las matrículas profesionales, certificados de inscripción profesional y certificados de matrícula otorgados con anterioridad a la vigencia de la presente ley conservan su validez y se presumen auténticas.', 12, 3, 0, '2021-01-07', NULL, NULL, 0),
(14, 'EJERCICIO ILEGAL DE LA PROFESIÓN.', 'Ejerce ilegalmente la profesión de la Ingeniera, de sus profesiones afines o de sus profesiones auxiliares y por lo tanto incurrirá en las sanciones que decrete la autoridad penal, administrativa o de policía correspondiente, la persona que sin cumplir los requisitos previstos en esta ley o en normas concordantes, practique cualquier acto comprendido en el ejercicio de estas profesiones. En igual infracción incurrirá la persona que, mediante avisos, propaganda, anuncios profesionales, instalación de oficinas, fijación de placas murales o en cualquier otra forma, actúe, se anuncie o se presente como Ingeniero o como Profesional Afín o como Profesional Auxiliar de la Ingeniería, sin el cumplimiento de los requisitos establecidos en la presente ley.<br><br>PARÁGRAFO. También incurre en ejercicio ilegal de la profesión, el profesional de la ingeniería, de alguna de sus profesiones afines o profesiones auxiliares, que estando debidamente inscrito en el registro profesional de ingeniería, ejerza la profesión estando suspendida su matrícula profesional, certificado de inscripción profesional o certificado de matrícula, respectivamente.', 13, 4, 0, '2021-01-07', NULL, NULL, 0),
(15, 'ENCUBRIMIENTO DEL EJERCICIO ILEGAL DE LA PROFESIÓN.', 'El servidor público que en el ejercicio de su cargo, autorice, facilite, patrocine, encubra o permita el ejercicio ilegal de la ingeniería o de alguna de sus profesiones afines o auxiliares, incurrirá en falta disciplinaria, sancionable de acuerdo con las normas legales vigentes.<br><br>PARÁGRAFO. Si quien permite, o encubre el ejercicio de la profesión, por parte de quien no reúne los requisitos establecidos en la presente ley, está matriculado o inscrito como ingeniero o profesión afín o auxiliar, podrá ser suspendido del ejercicio legal de la profesión hasta por el término de cinco años.', 14, 4, 0, '2021-01-07', NULL, NULL, 0),
(16, 'SANCIONES.', 'El particular que viole las disposiciones de la presente ley incurrirá, sin perjuicio de las sanciones penales y de policía, en multa de dos (2) a cincuenta (50) salarios mínimos mensuales legales vigentes.<br><br>PARÁGRAFO. Las multas que se impongan como sanción por el incumplimiento de la presente ley y sus normas reglamentarias, deberán consignarse a favor del Tesoro Municipal del lugar donde se cometa la infracción y serán impuestas por el respectivo Alcalde Municipal o por quien haga sus veces, mediante la aplicación de las normas de procedimiento establecidas para la investigación y sanción de las contravenciones especiales, según el Código Nacional de Policía o norma que lo sustituya o modifique.', 15, 4, 0, '2021-01-07', NULL, NULL, 0),
(17, 'AVISO DEL EJERCICIO ILEGAL DE LA INGENIERÍA.', 'El Consejo Profesional Nacional de Ingeniería, Copnia, deberá dar aviso a todas las empresas relacionadas con la ingeniería o que utilicen los servicios de ingenieros, de la denuncia que se instaure contra cualquier persona por ejercer ilegalmente la ingeniería, utilizando todos los medios a su alcance para que se impida tal infracción, con el fin de proteger a la sociedad del eventual riesgo a que este hecho la somete.', 16, 4, 0, '2021-01-07', NULL, NULL, 0),
(18, 'RESPONSABILIDAD DE LAS PERSONAS JURÍDICAS Y DE SUS REPRESENTANTES.', 'La sociedad, firma, empresa u organización profesional, cuyas actividades comprendan, en forma exclusiva o parcial, alguna o algunas de aquellas que correspondan al ejercicio de la ingeniería, de sus profesiones afines o de sus profesiones auxiliares, está obligada a incluir en su nómina permanente, como mínimo, a un profesional matriculado en la carrera correspondiente al objeto social de la respectiva persona jurídica.<br><br>PARÁGRAFO. Al representante legal de la persona jurídica que omita el cumplimiento de lo dispuesto en el presente artículo se le aplicarán las sanciones previstas para el ejercicio ilegal de profesión y oficio reglamentado, mediante la aplicación del procedimiento establecido para las contravenciones especiales de policía o aquel que lo sustituya.', 17, 4, 0, '2021-01-07', NULL, NULL, 0),
(19, 'DIRECCIÓN DE LABORES DE INGENIERÍA.', 'Todo trabajo relacionado con el ejercicio de la Ingeniería, deberá ser dirigido por un ingeniero inscrito en el registro profesional de ingeniería y con tarjeta de matrícula profesional en la rama respectiva.<br><br>PARÁGRAFO. Cuando la obra se trate de aquellas a las que se refiere la Ley 400 de 1997, además de los requisitos establecidos en la presente ley, se deberá cumplir con los establecidos en tal régimen o en la norma que lo sustituya, so pena de incurrir en las sanciones previstas por violación del Código de Ética y el correcto ejercicio de la profesión.<br><br>Nota: Sentencia C-191 de 2005, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE condicionalmente en el entendido de que la expresión “relacionado con” comprende exclusivamente las relaciones directas y necesarias con el ejercicio de la ingeniería.', 18, 4, 0, '2021-01-07', NULL, NULL, 0),
(20, 'DICTÁMENES PERICIALES.', 'El cargo o la función de perito, cuando el dictamen comprenda cuestiones técnicas de la ingeniería, de sus profesiones afines o de sus profesiones auxiliares, se encomendará al profesional cuya especialidad corresponda a la materia objeto del dictamen.', 19, 4, 0, '2021-01-07', NULL, NULL, 0),
(21, 'PROPUESTAS Y CONTRATOS.', 'Las propuestas que se formulen en las licitaciones y concursos abiertos por entidades públicas del orden nacional, seccional o local, para la adjudicación de contratos cuyo objeto implique el desarrollo de las actividades catalogadas como ejercicio de la ingeniería, deberán estar avalados, en todo caso, cuando menos, por un ingeniero inscrito y con tarjeta de matrícula profesional en la respectiva rama de la ingeniería.<br><br>En los contratos que se celebren como resultado de la licitación o del concurso, los contratistas tendrán la obligación de encomendar los estudios, la dirección técnica, la ejecución de los trabajos o la interventoría, a profesionales inscritos en el registro profesional de ingeniería, acreditados con la tarjeta de matrícula profesional o, excepcionalmente, con la constancia o certificado de su vigencia.<br><br>PARÁGRAFO. Lo dispuesto en este artículo se aplicará en todas sus partes, tanto a las propuestas que se presenten, como a los contratos de igual naturaleza y que, con el mismo objetivo, se celebren con las sociedades de economía mixta y con los establecimientos públicos y empresas industriales o comerciales del orden nacional, departamental, distrital o municipal y aquellas descentralizadas por servicios.<br><br>Nota: Sentencia C-191 de 2005, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE, salvo el aparte tachado del inciso 2o. que se declara INEXEQUIBLE.', 20, 4, 0, '2021-01-07', NULL, NULL, 0),
(22, 'DENUNCIA DEL EJERCICIO ILEGAL DE LA INGENIERÍA.', 'El Consejo Profesional Nacional de Ingeniería, Copnia, denunciará y publicará por los medios a su alcance el ejercicio ilegal de la profesión de que tenga conocimiento, con el fin de proteger a la sociedad del eventual riesgo a que este hecho la somete.', 21, 4, 0, '2021-01-07', NULL, NULL, 0),
(23, ' ', 'En las construcciones, consultorías, estudios, proyectos, cálculos, diseños, instalaciones, montajes, interventorías, asesorías y demás trabajos relacionados con el ejercicio de las profesiones a las que se refiere la presente ley, la participación de los profesionales extranjeros no podrá ser superior a un veinte por ciento (20%) de su personal de ingenieros o profesionales auxiliares o afines colombianos, sin perjuicio de la aplicación de las normas laborales vigentes.<br><br>PARÁGRAFO. Cuando previa autorización del Ministerio de Trabajo y tratándose de personal estrictamente técnico o científico indispensable, fuere necesaria una mayor participación de profesionales extranjeros que la establecida anteriormente, el patrono o la firma o entidad que requiera tal labor, dispondrá de un (1) año contado a partir de la fecha de la iniciación de labores, para suministrar adecuada capacitación a los profesionales nacionales, con el fin de reemplazar a los extranjeros, hasta completar el mínimo de ochenta por ciento (80%) de nacionales.', 22, 5, 0, '2021-01-07', NULL, NULL, 0),
(24, 'PERMISO TEMPORAL PARA EJERCER SIN MATRÍCULA A PERSONAS TITULADAS Y DOMICILIADAS EN EL EXTERIOR.', 'Quien ostente el título académico de ingeniero o de profesión auxiliar o afín de las profesiones aquí reglamentadas, esté domiciliado en el exterior y pretenda vincularse bajo cualquier modalidad contractual para ejercer temporalmente la profesión en el territorio nacional, deberá obtener del Consejo Profesional Nacional de Ingeniería, Copnia, un permiso temporal para ejercer sin matrícula profesional, certificado de inscripción profesional o certificado de matrícula, según el caso; el cual tendrá validez por un (1) año y podrá ser renovado discrecionalmente por el Consejo Profesional Nacional de Ingeniería, Copnia, siempre, hasta por el plazo máximo del contrato o de la labor contratada, previa presentación de solicitud suficientemente motivada, por parte de la empresa contratante o por el profesional interesado o su representante; título o diploma debidamente consularizado o apostillado, según el caso; fotocopia del contrato que motiva su actividad en el país y el recibo de consignación de los derechos respectivos.<br><br>PARÁGRAFO 1o. <strike>Los requisitos y el trámite establecidos en este artículo se aplicarán para todas las ramas de la ingeniería, de sus profesiones afines y de sus profesiones auxiliares, aunque tengan reglamentación especial y será otorgado por el Consejo Profesional Nacional de Ingeniería, Copnia, exclusivamente.</strike> La autoridad competente otorgará la visa respectiva, sin perjuicio del permiso temporal de que trata el presente artículo.<br><br>PARÁGRAFO 2o. Se eximen de la obligación de tramitar el Permiso Temporal a que se refiere el presente Artículo, los profesionales extranjeros invitados a dictar conferencias, seminarios, simposios, congresos, talleres de tipo técnico o científico, siempre y cuando no tengan carácter permanente.<br><br>PARÁGRAFO 3o. Si el profesional beneficiario del permiso temporal pretende laborar de manera indefinida en el país, deberá homologar o convalidar el título de acuerdo con las normas que rigen la materia y tramitar la matrícula profesional o el certificado de inscripción profesional, según el caso.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado CONDICIONALMENTE EXEQUIBLE &#34... en el entendido de que los profesionales titulados y domiciliados en el exterior en disciplinas relacionadas con la ingeniería y que deseen obtener un permiso temporal para trabajar deberán acudir al COPNIA, siempre y cuando su especialidad no cuente con un consejo profesional propio encargado de esa función. La declaración se restringe al cargo analizado&#34, salvo el aparte tachado que se declara INEXEQUIBLE.', 23, 5, 0, '2021-01-07', NULL, NULL, 0),
(25, 'CONSEJO PROFESIONAL NACIONAL DE INGENIERÍA.', 'En adelante el Consejo Profesional Nacional de Ingeniería y sus Profesiones Auxiliares, se denominará Consejo Profesional Nacional de Ingeniería y su sigla será &#34Copnia&#34 y tendrá su sede principal en Bogotá, D.C.<br><br>Notas:<br><br>Mediante la Sentencia C-078 de 2003, la Corte Constitucional revisó las objeciones presidenciales a los artículos25, 26, 27, 28 y 80 delproyecto de Ley No. 44 de 2001 - Senado de la República-,218 de 2002 -Cámara de Representantes–, en cumplimiento de lo dispuesto en el artículo 167 de la Constitución Política.<br><br>Sentencia C-649 de 2003, Corte Constitucional. Se declaró cumplida la exigencia constitucional del artículo 167 de la Carta Política.<br><br>Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE por los cargos analizados.', 24, 6, 0, '2021-01-07', NULL, NULL, 0),
(26, 'RENTAS Y PATRIMONIO.', 'Las rentas y el patrimonio del Copnia, estarán conformados por los recursos públicos que en actualidad posea, o que haya adquirido la Nación para su funcionamiento; por los recursos provenientes del cobro de certificados y constancias en ejercicio de sus funciones, cuyo valor será fijado de manera razonable de acuerdo con su determinación; por los recursos provenientes de los servicios a derechos de matrícula, tarjetas y permisos temporales. La t asa se distribuirá en forma equitativa entre los usuarios a partir de criterios relevantes que reconozcan los costos económicos requeridos, en las condiciones que fije el reglamento que adopte el Gobierno Nacional, derechos que no podrán exceder de la suma equivalente a un (1) salario mínimo mensual vigente.<br><br>PARÁGRAFO. Para ejercer su función de policía administrativa, el Copnia contará con el apoyo, cuando así lo solicite, de las autoridades administrativas y de policía, nacionales, seccionales y locales, según el caso.<br><br>Notas:<br><br>Mediante la Sentencia C-078 de 2003, la Corte Constitucional revisó las objeciones presidenciales a los artículos25, 26, 27, 28 y 80 delproyecto de Ley No. 44 de 2001 - Senado de la República-,218 de 2002 -Cámara de Representantes–, en cumplimiento de lo dispuesto en el artículo 167 de la Constitución Política.<br><br>Sentencia C-649 de 2003, Corte Constitucional. Se declaró cumplida la exigencia constitucional del artículo 167 de la Carta Política.<br><br>Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE por los cargos analizados.', 25, 6, 0, '2021-01-07', NULL, NULL, 0),
(27, 'FUNCIONES ESPECÍFICAS DEL CONSEJO PROFESIONAL NACIONAL DE INGENIERÍA, COPNIA.', 'El Consejo Profesional Nacional de Ingeniería, Copnia, tendrá como funciones específicas las siguientes:<br><br>a) Dictar su propio reglamento interno y el de los Consejos Seccionales o Regionales;<br><br>b) (sic) Confirmar, aclarar, derogar o revocar las resoluciones de aprobación o denegación de expedición de matrículas profesionales, de certificados de inscripción profesional y de certificados de matrícula profesional, a profesionales de la ingeniería, de sus profesiones afines y de sus profesionales auxiliares, respectivamente, expedidas por los Consejos Seccionales o Regionales;<br><br>c) Expedir las tarjetas de matrícula, de certificados de inscripción profesional y de certificado de matrícula a los ingenieros, profesionales afines y profesionales auxiliares de la ingeniería, respectivamente;<br><br>d) Resolver en única instancia sobre la expedición o cancelación de los permisos temporales;<br><br>e) Denunciar ante las autoridades competentes las violaciones al ejercicio legal de la ingeniería, de sus profesiones afines y de sus profesiones auxiliares;<br><br>f) Denunciar ante las autoridades competentes los delitos y contravenciones de que tenga conocimiento con ocasión de sus funciones;<br><br>g) Resolver en segunda instancia, los recursos que se interpongan contra las determinaciones que pongan fin a las actuaciones de primera instancia de los Consejos Seccionales o Regionales;<br><br>h) Implementar y mantener, dentro de las técnicas de la informática y la tecnología moderna, el registro profesional de ingeniería correspondiente a los profesionales de la ingeniería, de sus profesiones afines y de sus profesiones auxiliares;<br><br>i) Emitir conceptos y responder consultas sobre aspectos relacionados con el ejercicio de la ingeniería, sus profesiones afines y sus profesiones auxiliares, cuando así se le solicite para cualquier efecto legal o profesional;<br><br>j) Servir de cuerpo consultivo oficial del Gobierno, en todos los asuntos inherentes a la reglamentación de la ingeniería, de sus profesiones afines y de sus profesiones auxiliares;<br><br>k) Establecer el valor de los derechos provenientes del cobro de certificados y constancias, el cual será fijado de manera razonable de acuerdo con su determinación; y de los recursos provenientes por los servicios de derecho de matrícula, tarjetas y permisos temporales. La tasa se distribuirá en forma equitativa entre los usuarios a partir de criterios relevantes que recuperan los costos del servicio; en las condiciones que fije el reglamento que adopte el Gobierno Nacional, señalando el sistema y el método, para definir la recuperación de los costos de los servicios que se prestan a los usuarios o la participación de los servicios que se les proporcionan y la forma de hacer su reparto según el artículo 338 de la Constitución Política, derechos que no podrán exceder de la suma equivalente a un (1) salario mínimo legal mensual vigente;<br><br>l) Aprobar y ejecutar, en forma autónoma, el presupuesto del Consejo Profesional Nacional de Ingeniería, Copnia, y el de los Consejos Regionales o Seccionales;<br><br>m) Con el apoyo de las demás autoridades administrativas y de policía, inspeccionar, vigilar y controlar el ejercicio profesional de las personas naturales o jurídicas que ejerzan la ingeniería o alguna de sus profesiones auxiliares;<br><br>n) <strike>Crear, reestructurar o suprimir sus Consejos Regionales o Seccionales, de acuerdo con las necesidades propias de la función de inspección, control y vigilancia del ejercicio profesional y las disponibilidades presupuestales respectivas;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. Literal n) declarado INEXEQUIBLE<br><br>o) Adoptar su propia planta de personal de acuerdo con sus necesidades y determinación;<br><br>p) Velar por el cumplimiento de la presente ley y de las demás normas que la reglamenten y complementen;<br><br>q) Presentar al Ministerio de Relaciones Exteriores, observaciones sobre la expedición de visas a ingenieros, profesionales afines y profesionales auxiliares de la ingeniería, solicitadas con el fin de ejercer su profesión en el territorio nacional;<br><br>r) Presentar al Ministerio de Educación Nacional, observaciones sobre la aprobación de los programas de estudios y establecimientos educativos relacionados con la ingeniería, las profesiones afines y las profesiones auxiliares de esta;<br><br>s) Denunciar ante las autoridades competentes las violaciones de las disposiciones que reglamentan el ejercicio de la ingeniería, sus profesiones afines y sus profesiones auxiliares y solicitar de aquellas la imposición de las sanciones correspondientes;<br><br>t) Atender las quejas o denuncias hechas sobre la conducta de los ingenieros, profesionales afines y profesionales auxiliares de la ingeniería, que violen los mandatos de la presente ley, del correcto ejercicio y del Código de Ética Profesional absolviendo o sancionando, oportunamente, a los profesionales investigados;<br><br>u) Las demás que le señalen la ley y demás normas reglamentarias y complementarias.<br><br>Notas:<br><br>Mediante la Sentencia C-078 de 2003, la Corte Constitucional revisó las objeciones presidenciales a los artículos25, 26, 27, 28 y 80 delproyecto de Ley No. 44 de 2001 - Senado de la República-,218 de 2002 -Cámara de Representantes–, en cumplimiento de lo dispuesto en el artículo 167 de la Constitución Política.<br><br>Sentencia C-649 de 2003, Corte Constitucional. Se declaró cumplida la exigencia constitucional del artículo 167 de la Carta Política.<br><br>Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado EXEQUIBLE por los cargos analizados.', 26, 6, 0, '2021-01-07', NULL, NULL, 0),
(28, '<strike>CREACIÓN DE LOS CONSEJOS SECCIONALES Y REGIONALES.</strike>', '<strike>Facúltase al Consejo Profesional Nacional de Ingeniería, Copnia, para que con el voto de la mayoría de los miembros de su Junta de Consejeros y mediante resolución motivada, suprima, fusione o cree sus respectivos Consejos Seccionales o regionales cuando lo estime conveniente, los cuales podrán no coincidir con la organización territorial de la República.<br><br>PARÁGRAFO. En todo caso, con el lleno de los requisitos establecidos en el presente artículo el Consejo Profesional Nacional de Ingeniería, Copnia, podrá crear Consejos Regionales, donde las necesidades de la función de control, inspección y vigilancia lo exijan. Estos tendrán jurisdicción sobre dos (2) o más departamentos.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El presente artículo fue declarado INEXEQUIBLE.</strike>', 27, 7, 0, '2021-01-07', NULL, NULL, 0),
(29, 'INTEGRACIÓN DE LA JUNTA DE CONSEJEROS REGIONAL O SECCIONAL.', 'Las Juntas de Consejeros Regionales o Seccionales estarán integradas de la siguiente manera:<br><br>El Gobernador del departamento en el cual funcione el Consejo Regional o Seccional, quien lo presidirá; pudiendo delegar, exclusivamente, en el Secretario de Obras Públicas del departamento o quien haga sus veces.<br>2. El Secretario de Educación del departamento sede o su delegado.<br>El Secretario de Planeación del departamento sede o quien haga sus veces, o su delegado.<br>El Rector o el Decano de ingeniería de una de las universidades o instituciones de Educación Superior del departamento sede, que otorguen título de ingeniero, o de alguna de sus profesiones afines o de alguna de sus profesiones auxiliares, elegido en junta convocada por el Copnia para tal fin, en el caso en que existan más de una.<br>El Presidente de una de las agremiaciones regionales de ingeniería, de sus profesiones afines o de sus profesiones auxiliares, elegido en junta convocada por el Copnia para tal fin, en el caso en que existan más de una en el departamento sede.<br>PARÁGRAFO 1o. El período de los representantes elegidos en junta será de dos (2) años, pudiendo ser reelegidos solo para el período subsiguiente.<br><br>PARÁGRAFO 2o. Los delegados deberán ser ingenieros de las ramas inspeccionadas, vigiladas y controladas por el Copnia, debidamente matriculados.', 28, 7, 0, '2021-01-07', NULL, NULL, 0),
(30, 'POSTULADOS ÉTICOS DEL EJERCICIO PROFESIONAL.', 'El ejercicio profesional de la Ingeniería en todas sus ramas, de sus profesiones afines y sus respectivas profesiones auxiliares, debe ser guiado por criterios, conceptos y elevados fines, que propendan a enaltecerlo; por lo tanto deberá estar ajustado a las disposiciones de las siguientes normas que constituyen su Código de Ética Profesional.<br><br>PARÁGRAFO. El Código de Ética Profesional adoptado mediante la presente ley será el marco del comportamiento profesional del ingeniero en general, de sus profesionales afines y de sus profesionales auxiliares y su violación será sancionada mediante el procedimiento establecido en el presente título.', 29, 8, 0, '2021-01-07', NULL, NULL, 0),
(31, ' ', 'Los ingenieros, sus profesionales afines y sus profesionales auxiliares, para todos los efectos del Código de Ética Profesional y su Régimen Disciplinario contemplados en esta ley, se denominarán &#34Los profesionales&#34.', 30, 8, 0, '2021-01-07', NULL, NULL, 0),
(32, 'DEBERES GENERALES DE LOS PROFESIONALES.', 'Son deberes generales de los profesionales los siguientes:<br><br>a) Cumplir con los requerimientos, citaciones y demás diligencias que formule u ordene el Consejo Profesional Nacional de Ingeniería respectivo o cualquiera de sus Consejos Seccionales o Regionales;<br><br>b) Custodiar y cuidar los bienes, valores, documentación e información que por razón del ejercicio de su profesión, se le hayan encomendado o a los cuales tenga acceso; impidiendo o evitando su sustracción, destrucción, ocultamiento o utilización indebidos, de conformidad con los fines a que hayan sido destinados;<br><br><strike>c) Tratar con respeto, imparcialidad y rectitud a todas las personas con quienes tenga relación con motivo del ejercicio de la profesión;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal c) declarado INEXEQUIBLE.<br><br><strike>d) Registrar en el Consejo Profesional Nacional de Ingeniería respectivo o en alguno de sus Consejos Seccionales o Regionales, su domicilio o dirección de la residencia y teléfono, dando aviso oportuno de cualquier cambio;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal d) declarado INEXEQUIBLE.<br><br>e) Permitir el acceso inmediato a los representantes del Consejo Profesional Nacional de Ingeniería respectivo y autoridades de policía, a los lugares donde deban adelantar sus investigaciones y el examen de los libros, documentos y diligencias correspondientes, así como prestarles la necesaria colaboración para el cumplido desempeño de sus funciones;<br><br>f) Denunciar los delitos, contravenciones y faltas contra este Código de Ética, de que tuviere conocimiento con ocasión del ejercicio de su profesión, aportando toda la información y pruebas que tuviere en su poder;<br><br>g) Los demás deberes incluidos en la presente ley y los indicados en todas las normas legales y técnicas relacionados con el ejercicio de su profesión.', 31, 9, 0, '2021-01-07', NULL, NULL, 0),
(33, 'PROHIBICIONES GENERALES A LOS PROFESIONALES.', 'Son prohibiciones generales a los profesionales:<br><br>a) Nombrar, elegir, dar posesión o tener a su servicio, para el desempeño de un cargo privado o público que requiera ser desempeñado por profesionales de la ingeniería o alguna de sus profesiones afines o auxiliares, en forma permanente o transitoria, a personas que ejerzan ilegalmente la profesión;<br><br>b) Permitir, tolerar o facilitar el ejercicio ilegal de las profesiones reguladas por esta ley;<br><br>c) Solicitar o aceptar comisiones en dinero o en especie por concepto de adquisición de bienes y servicios para su cliente, sociedad, institución, etc., para el que preste sus servicios profesionales, salvo autorización legal o contractual;<br><br>d) Ejecutar actos de violencia, malos tratos, injurias o calumnias contra superiores, subalternos, compañeros de trabajo, socios, clientes o funcionarios del Consejo Profesional Nacional de Ingeniería respectivo o alguno de sus Consejos Regionales o Seccionales;<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal d) declarado CONDICIONALMENTE EXEQUIBLE, &#34... en el entendido de que las conductas descritas no son sancionables cuando se cometan respecto de un colega o socio en un contexto ajeno al ámbito profesional&#34.<br><br><strike>e) Ejecutar en el lugar donde ejerza su profesión, actos que atenten contra la moral y las buenas costumbres;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal e) declarado INEXEQUIBLE.<br><br>f) El reiterado e injustificado incumplimiento de las obligaciones civiles, comerciales o laborales, que haya contraído con ocasión del ejercicio de su profesión o de actividades relacionadas con este;<br><br>g) Causar, intencional o culposamente, daño o pérdida de bienes, elementos, equipos, herramientas o documentos que hayan llegado a su poder por razón del ejercicio de su profesión;<br><br><strike>h) Proferir, en actos oficiales o privados relacionados con el ejercicio de la profesión, expresiones injuriosas o calumniosas contra el Consejo Profesional Nacional de Ingeniería, los miembros de la Junta de Consejeros o sus funcionarios; contra cualquier autoridad relacionada con el ámbito de la ingeniería o contra alguna de sus agremiaciones o sus directivas;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal h) declarado INEXEQUIBLE.<br><br>i) Incumplir las decisiones disciplinarias que imponga el Consejo Profesional Nacional de Ingeniería respectivo u obstaculizar su ejecución;<br><br>j) Solicitar o recibir directamente o por interpuesta persona, gratificaciones, dádivas o recompensas en razón del ejercicio de su profesión, salvo autorización contractual o legal;<br><br>k) Participar en licitaciones, concursar o suscribir contratos estatales cuyo objeto esté relacionado con el ejercicio de la ingeniería, estando incurso en alguna de las inhabilidades e incompatibilidades que establece la Constitución y la ley;<br><br>l) Las demás prohibiciones incluidas en la presente ley y normas que la complementen y reglamenten.', 32, 9, 0, '2021-01-07', NULL, NULL, 0),
(34, 'DEBERES ESPECIALES DE LOS PROFESIONALES PARA CON LA SOCIEDAD.', 'Son deberes especiales de los profesionales para con la sociedad:<br><br><strike>a) Interesarse por el bien público, con el objeto de contribuir con sus conocimientos, capacidad y experiencia para servir a la humanidad; <Jurisprudencia Vigencia></strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal a) declarado INEXEQUIBLE.<br><br><strike>b) Cooperar para el progreso de la sociedad, aportando su colaboración intelectual y material en obras culturales, ilustración técnica, ciencia aplicada e investigación científica;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal b) declarado INEXEQUIBLE.<br><br><strike>c) Aplicar el máximo de su esfuerzo en el sentido de lograr una clara expresión hacia la comunidad de los aspectos técnicos y de los asuntos relacionados con sus respectivas, profesiones y su ejercicio;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal c) declarado INEXEQUIBLE.<br><br>d) Estudiar cuidadosamente el ambiente que será afectado en cada propuesta (sic) de tarea (sic), evaluando los impactos ambientales en los ecosistemas involucrados, urbanizados o naturales, incluido el entorno socioeconómico, seleccionando la mejor alternativa para contribuir a un desarrollo ambientalmente sano y sostenible, con el objeto de lograr la mejor calidad de vida para la población;<br><br>e) Rechazar toda clase de recomendaciones en trabajos que impliquen daños evitables para el entorno humano y la naturaleza, tanto en espacios abiertos, como en el interior de edificios, evaluando su impacto ambiental, tanto en corto como en largo plazo;<br><br>f) Ejercer la profesión sin supeditar sus conceptos o sus criterios profesionales a actividades partidistas;<br><br>g) Ofrecer desinteresadamente sus servicios profesionales en caso de calamidad pública;<br><br>h) Proteger la vida y salud de los miembros de la comunidad, evitando riesgos innecesarios en la ejecución de los trabajos;<br><br>i) Abstenerse de emitir conceptos profesionales, sin tener la convicción absoluta de estar debidamente informados al respecto;<br><br>j) Velar por la protección de la integridad del patrimonio nacional.<br><br>', 33, 9, 0, '2021-01-07', NULL, NULL, 0),
(35, 'PROHIBICIONES ESPECIALES A LOS PROFESIONALES RESPECTO DE LA SOCIEDAD.', 'Son prohibiciones especiales a los profesionales respecto de la sociedad:<br><br>a) Ofrecer o aceptar trabajos en contra de las disposiciones legales vigentes, o aceptar tareas que excedan la incumbencia que le otorga su título y su propia preparación;<br><br>b) Imponer su firma, a título gratuito u oneroso, en planos, especificaciones, dictámenes, memorias, informes, solicitudes de licencias urbanísticas, solicitudes de licencias de construcción y toda otra documentación relacionada con el ejercicio profesional, que no hayan sido estudiados, controlados o ejecutados personalmente;<br><br>c) Expedir, permitir o contribuir para que se expidan títulos, diplomas, matrículas, tarjetas de matrícula profesional; certificados de inscripción profesional o tarjetas de certificado de inscripción profesional y/o certificados de vigencia de matrícula profesional, a personas que no reúnan los requisitos legales o reglamentarios para ejercer estas profesiones o no se encuentren debidamente inscritos o matriculados;<br><br>d) Hacer figurar su nombre en anuncios, membretes, sellos, propagandas y demás medios análogos junto con el de personas que ejerzan ilegalmente la profesión;<br><br>e) iniciar o permitir el inicio de obras de construcción sin haber obtenido de la autoridad competente la respectiva licencia o autorización.', 34, 9, 0, '2021-01-07', NULL, NULL, 0),
(36, 'DEBERES DE LOS PROFESIONALES PARA CON LA DIGNIDAD DE SUS PROFESIONES', 'Son deberes de los profesionales de quienes trata este Código para con la dignidad de sus profesiones:<br><br><strike>a) Contribuir con su conducta profesional y con todos los medios a su alcance para que en el consenso público se preserve un exacto concepto de estas profesiones, de su dignidad y del alto respeto que merecen;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal b) declarado INEXEQUIBLE.<br><br>b) Respetar y hacer respetar todas las disposiciones legales y reglamentaras que incidan en actos de estas profesiones, así como denunciar todas sus transgresiones;<br><br>c) Velar por el buen prestigio de estas profesiones;<br><br>d) Sus medios de propaganda deberán ajustarse a las reglas de la prudencia y al decoro profesional, sin hacer uso de medios de publicidad con avisos exagerados que den lugar a equívocos sobre su especialidad o idoneidad profesional.', 35, 9, 0, '2021-01-07', NULL, NULL, 0),
(37, 'PROHIBICIONES A LOS PROFESIONALES RESPECTO DE LA DIGNIDAD DE SUS PROFESIONES.', 'Son prohibiciones a los profesionales respecto de la dignidad de sus profesiones:<br><br>a) Recibir o conceder comisiones, participaciones u otros beneficios ilegales o injustificados con el objeto de gestionar, obtener o acordar designaciones de índole profesional o la encomienda de trabajo profesional.', 36, 9, 0, '2021-01-07', NULL, NULL, 0),
(38, 'DEBERES DE LOS PROFESIONALES PARA CON SUS COLEGAS Y DEMÁS PROFESIONALES.', 'Son deberes de los profesionales para con sus colegas y demás profesionales de la ingeniería:<br><br>a) Abstenerse de emitir públicamente juicios adversos sobre la actuación de algún colega, señalando errores profesionales en que presuntamente haya incurrido, a no ser de que ello sea indispensable por razones ineludibles de interés general o, que se le haya dado anteriormente la posibilidad de reconocer y rectificar aquellas actuaciones y errores, haciendo dicho profesional caso omiso de ello;<br><br>b) Obrar con la mayor prudencia y diligencia cuando se emitan conceptos sobre las actuaciones de los demás profesionales;<br><br>c) Fijar para los colegas que actúen como colaboradores o empleados suyos, salarios, honorarios, retribuciones o compensaciones justas y adecuadas, acordes con la dignidad de las profesiones y la importancia de los servicios que prestan;<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal c) declarado CONDICIONALMENTE EXEQUIBLE &#34 ... en el entendido de que, para efectos disciplinarios, al definir si la retribución es justa y adecuada en cada caso la autoridad deberá tener como único parámetro de juicio todas las normas jurídicas vigentes, aplicables a la relación que se examina&#34.<br><br>d) Respetar y reconocer la propiedad intelectual de los demás profesionales sobre sus diseños y proyectos.', 37, 9, 0, '2021-01-07', NULL, NULL, 0);
INSERT INTO `articulos` (`id`, `nombre`, `contenido`, `numero`, `id_capitulo`, `vistas`, `fecha_modificacion`, `created_at`, `updated_at`, `paragrafo`) VALUES
(39, 'PROHIBICIONES A LOS PROFESIONALES RESPECTO DE SUS COLEGAS Y DEMÁS PROFESIONALES', ' Son prohibiciones a los profesionales, respecto de sus colegas y demás profesionales de la ingeniería:<br><br>a) Utilizar sin autorización de sus legítimos autores y para su aplicación en trabajos profesionales propios, los estudios, cálculos, planos, diseños y software y demás documentación perteneciente a aquellos, salvo que la tarea profesional lo requiera, caso en el cual se deberá dar aviso al autor de tal utilización;<br><br>b) Difamar, denigrar o criticar injustamente a sus colegas, o contribuir en forma directa o indirecta a perjudicar su reputación o la de sus proyectos o negocios con motivo de su actuación profesional;<br><br>c) Usar métodos de competencia desleal con los colegas;<br><br>d) Designar o influir para que sean designados en cargos técnicos que deban ser desempeñados por los profesionales de que trata el presente Código, a personas carentes de los títulos y calidades que se exigen legalmente;<br><br>e) Proponer servicios con reducción de precios, luego de haber conocido las propuestas de otros profesionales;<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. La Corte Constitucional se declaró INHIBIDA de fallar sobre este literal por ineptitud de la demanda.<br><br>f) Revisar trabajos de otro profesional sin conocimiento y aceptación previa del mismo, a menos que este se haya separado completamente de tal trabajo.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. La Corte Constitucional se declaró INHIBIDA de fallar sobre este literal por ineptitud de la demanda.', 38, 9, 0, '2021-01-07', NULL, NULL, 0),
(40, 'DEBERES DE LOS PROFESIONALES PARA CON SUS CLIENTES Y EL PÚBLICO EN GENERAL.', 'Son deberes de los profesionales para con sus clientes y el público en general:<br><br>a) Mantener el secreto y reserva, respecto de toda circunstancia relacionada con el cliente y con los trabajos que para él se realizan, salvo obligación legal de revelarla o requerimiento del Consejo Profesional respectivo;<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. La Corte Constitucional se declaró INHIBIDA de fallar sobre este literal por ineptitud de la demanda.<br><br>b) Manejar con honestidad y pulcritud los fondos que el cliente le confiare con destino a desembolsos exigidos por los trabajos a su cargo y rendir cuentas claras, precisas y frecuentes. Todo ello independientemente y sin perjuicio de lo establecido en las leyes vigentes;<br><br>c) Dedicar toda su aptitud y atender con la mayor diligencia y probidad, los asuntos encargados por su cliente;<br><br>d) Los profesionales que dirijan el cumplimiento de contratos entre sus clientes y terceras personas, son ante todo asesores y guardianes de los intereses de sus clientes y en ningún caso, les es lícito actuar en perjuicio de aquellos terceros.', 39, 9, 0, '2021-01-07', NULL, NULL, 0),
(41, 'PROHIBICIONES A LOS PROFESIONALES RESPECTO DE SUS CLIENTES Y EL PÚBLICO EN GENERAL.', 'Son prohibiciones a los profesionales respecto de sus clientes y el público en general:<br><br>a) Ofrecer la prestación de servicios cuyo objeto, por cualquier razón de orden técnico, jurídico, reglamentario, económico o social, sea de dudoso o imposible cumplimiento, o los que por circunstancias de idoneidad personal, no pudiere satisfacer;<br><br>b) Aceptar para su beneficio o el de terceros, comisiones, descuentos, bonificaciones u otras análogas ofrecidas por proveedores de equipos, insumos, materiales, artefactos o estructuras, por contratistas y/o por otras personas directamente interesadas en la ejecución de los trabajos que proyecten o dirijan, salvo autorización legal o contractual.', 40, 9, 0, '2021-01-07', NULL, NULL, 0),
(42, 'DEBERES DE LOS PROFESIONALES QUE SE DESEMPEÑEN EN CALIDAD DE SERVIDORES PÚBLICOS O PRIVADOS.', 'Son deberes de los profesionales que se desempeñen en funciones públicas o privadas, los siguientes:<br><br>a) Actuar de manera imparcial, cuando por las funciones de su cargo público o privado, sean responsables de fijar, preparar o evaluar pliegos de condiciones de licitaciones o concursos;<br><br><strike>b) Los profesionales que se hallen ligados entre sí por razón de jerarquía, ya sea en la administración pública o privada, se deben mutuamente, independiente y sin perjuicio de aquella relación, el respeto y el trato impuesto por su condición de colegas.</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal b) declarado INEXEQUIBLE.', 41, 9, 0, '2021-01-07', NULL, NULL, 0),
(43, 'PROHIBICIONES A LOS PROFESIONALES QUE SE DESEMPEÑEN EN CALIDAD DE SERVIDORES PÚBLICOS O PRIVADOS.', 'Son prohibiciones a los profesionales que se desempeñen en funciones públicas o privadas, las siguientes:<br><br>a) Participar en el proceso de evaluación de tareas profesionales de colegas, con quienes se tuviese vinculación de parentesco, hasta el grado fijado por las normas de contratación pública, o vinculación societaria de hecho o de derecho. La violación de esta norma se imputará también al profesional que acepte tal evaluación;<br><br><strike>b) Los profesionales superiores jerárquicos, deben abstenerse de proceder en forma que desprestigie o menoscabe a los profesionales que ocupen cargos subalternos al suyo;</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal b) declarado INEXEQUIBLE.<br><br><strike>c) Cometer, permitir o contribuir a que se cometan actos de injusticia en perjuicio de otro profesional, tales como destitución, reemplazo, disminución de categoría, aplicación de penas disciplinarias, sin causa demostrada y justa.</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal c) declarado INEXEQUIBLE.', 42, 9, 0, '2021-01-07', NULL, NULL, 0),
(44, 'DEBERES DE LOS PROFESIONALES EN LOS CONCURSOS O LICITACIONES.', 'Son deberes de los profesionales en los concursos o licitaciones:<br><br>a) Los profesionales que se dispongan a participar en un concurso o licitación por invitación pública o privada y consideren que las bases pudieren transgredir las normas de la ética profesional, deberán denunciar ante el Consejo Profesional respectivo la existencia de dicha transgresión;<br><br><strike>b) Los profesionales que participen en un concurso o licitación están obligados a observar la más estricta disciplina y el máximo respeto hacia los miembros del jurado o junta de selección, los funcionarios y los demás participantes.</strike><br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. El Literal b) declarado INEXEQUIBLE.', 43, 9, 0, '2021-01-07', NULL, NULL, 0),
(45, 'DE LAS PROHIBICIONES A LOS PROFESIONALES EN LOS CONCURSOS O LICITACIONES. ', 'Son prohibiciones de los profesionales en los concursos o licitaciones:<br><br>a) Los profesionales que hayan actuado como asesores de la parte contratante en un concurso o licitación deberán abstenerse de intervenir directa o indirectamente en las tareas profesionales requeridas para el desarrollo del trabajo que dio lugar al mismo, salvo que su intervención estuviese establecida en las bases del concurso o licitación.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. La Corte Constitucional se declaró INHIBIDA de fallar sobre este literal por ineptitud de la demanda.', 44, 9, 0, '2021-01-07', NULL, NULL, 0),
(46, 'RÉGIMEN DE INHABILIDADES E INCOMPATIBILIDADES QUE AFECTAN EL EJERCICIO.', 'Incurrirán en faltas al régimen de inhabilidades e incompatibilidades y por lo tanto se les podrán imponer las sanciones a que se refiere la presente ley:<br><br>a) Los profesionales que actúen simultáneamente como representantes técnicos o asesores de más de una empresa que desarrolle idénticas actividades y en un mismo tema, sin expreso consentimiento y autorización de las mismas para tal actuación;<br><br>b) Los profesionales que en ejercicio de sus actividades públicas o privadas hubiesen intervenido en determinado asunto, no podrán luego actuar o asesorar directa o indirectamente a la parte contraria en la misma cuestión;<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. La Corte Constitucional se declaró INHIBIDA de fallar sobre este literal por ineptitud de la demanda.<br><br>c) Los profesionales no deben intervenir como peritos o actuar en cuestiones que comprendan las inhabilidades e incompatibilidades generales de ley.', 45, 10, 0, '2021-01-07', NULL, NULL, 0),
(47, 'DEFINICIÓN DE FALTA DISCIPLINARIA.', 'Se entiende como falta que promueva la acción disciplinaria y en consecuencia, la aplicación del procedimiento aquí establecido, toda violación a las prohibiciones y al régimen de inhabilidades e incompatibilidades, al correcto ejercicio de la profesión o al cumplimiento de las obligaciones impuestas por el Código de Ética Profesional adoptado en virtud de la presente ley.', 46, 11, 0, '2021-01-07', NULL, NULL, 0),
(48, 'SANCIONES APLICABLES.', 'Los Consejos Seccionales o Regionales de Ingeniería podrán sancionar a los profesionales responsables de la comisión de faltas disciplinarias, con:<br><br>a) Amonestación escrita;<br><br>b) Suspensión en el ejercicio de la profesión hasta por cinco (5) años;<br><br>c) Cancelación de la matrícula profesional, del certificado de inscripción profesional o del certificado de matrícula profesional.', 47, 11, 0, '2021-01-07', NULL, NULL, 0),
(49, 'ESCALA DE SANCIONES.', 'Los profesionales de la ingeniería, de sus profesiones afines o de sus profesiones auxiliares, a quienes se les compruebe la violación de normas del Código de Ética Profesional adoptado en la presente ley, estarán sometidos a las siguientes sanciones por parte del Consejo Profesional de Ingeniería respectivo:<br><br>a) Las faltas calificadas por el Consejo Regional o Seccional como leves, siempre y cuando el profesional disciplinado no registre antecedentes disciplinarios, darán lugar a la aplicación de la sanción de amonestación escrita;<br><br>b) Las faltas calificadas por el Consejo Regional o Seccional como leves, cuando el profesional disciplinado registre antecedentes disciplinarios, darán lugar a la aplicación de la sanción de suspensión de la matrícula profesional hasta por el término de seis (6) meses;<br><br>c) Las faltas calificadas por el Consejo Regional o Seccional como graves, siempre y cuando el profesional disciplinado no registre antecedentes disciplinarios, darán lugar a la aplicación de la sanción de suspensión de la matrícula profesional por un término de seis (6) meses a dos (2) años;<br><br>d) Las faltas calificadas por el Consejo Regional o Seccional como graves, cuando el profesional disciplinado registre antecedentes disciplinarios, darán lugar a la aplicación de la sanción de suspensión de la matrícula profesional por un término de dos (2) a cinco (5) años;<br><br>e) Las faltas calificadas por el Consejo Regional o Seccional como gravísimas, siempre darán lugar a la aplicación de la sanción de cancelación de la matrícula profesional.', 48, 11, 0, '2021-01-07', NULL, NULL, 0),
(50, 'FALTAS SUSCEPTIBLES DE SANCIÓN DISCIPLINARIA.', 'Será susceptible de sanción disciplinaria todo acto u omisión del profesional, intencional o culposo, que implique violación de las prohibiciones; incumplimiento de las obligaciones; ejecución de actividades incompatibles con el decoro que exige el ejercicio de la ingeniería, de alguna de sus profesiones afines o de alguna de sus profesiones auxiliares; el ejercicio de actividades delictuosas relacionadas con el ejercicio de la profesión o el incumplimiento de alguno de los deberes que la profesión o las normas que la rigen le imponen.', 49, 11, 0, '2021-01-07', NULL, NULL, 0),
(51, 'ELEMENTOS DE LA FALTA DISCIPLINARIA.', 'La configuración de la falta disciplinaria deberá estar enmarcada dentro de los siguientes elementos o condiciones:<br><br>a) La conducta o el hecho debe haber sido cometido por un profesional de la ingeniería, de alguna de sus profesiones afines o de alguna de sus profesiones auxiliares, debidamente matriculado;<br><br>b) La conducta o el hecho debe ser intencional o culposo;<br><br>c) El hecho debe haber sido cometido en ejercicio de la profesión o de actividades conexas o relacionadas con esta;<br><br>d) La conducta debe ser violatoria de deberes, prohibiciones, inhabilidades o incompatibilidades inherentes a la profesión de la ingeniería, de alguna de sus profesiones afines o de alguna de sus profesiones auxiliares;<br><br>e) La conducta debe ser apreciable objetivamente y procesalmente debe estar probada;<br><br>f) La sanción disciplinaria debe ser la consecuencia lógica de un debido proceso, que se enmarque dentro de los postulados del artículo 29 de la Constitución Política y específicamente, del régimen disciplinario establecido en la presente ley.', 50, 11, 0, '2021-01-07', NULL, NULL, 0),
(52, 'PREVALENCIA DE LOS PRINCIPIOS RECTORES.', 'En la interpretación y aplicación del régimen disciplinario establecido prevalecerán, en su orden, los principios rectores que determina la Constitución Política, este código y el Código Contencioso Administrativo.', 51, 11, 0, '2021-01-07', NULL, NULL, 0),
(53, 'CRITERIOS PARA DETERMINAR LA GRAVEDAD O LEVEDAD DE LA FALTA DISCIPLINARIA.', 'El Consejo Profesional Seccional o Regional correspondiente de Ingeniería determinará si la falta es leve, grave o gravísima, de conformidad con los siguientes criterios:<br><br>a) El grado de culpabilidad;<br><br>b) El grado de perturbación a terceros o a la sociedad;<br><br>c) La falta de consideración con sus clientes, patronos, subalternos y, en general, con todas las personas a las que pudiera afectar el profesional disciplinado con su conducta;<br><br>d) La reiteración en la conducta;<br><br>e) La jerarquía y mando que el profesional disciplinado tenga dentro de su entidad, sociedad, la persona jurídica a la que pertenece o representa, etc.;<br><br>f) La naturaleza de la falta y sus efectos, según la trascendencia social de la misma, el mal ejemplo dado, la complicidad con otros profesionales y el perjuicio causado;<br><br>g) Las modalidades o circunstancias de la falta, teniendo en cuenta el grado de preparación, el grado de participación en la comisión de la misma y el aprovechamiento de la confianza depositada en el profesional disciplinado;<br><br>h) Los motivos determinantes, según se haya procedido por causas innobles o fútiles, o por nobles y altruistas;<br><br>i) El haber sido inducido por un superior a cometerla;<br><br>j) El confesar la falta antes de la formulación de cargos, haciéndose responsable de los perjuicios causados;<br><br>k) Procurar, por iniciativa propia, resarcir el daño o compensar el perjuicio causado, antes de que le sea impuesta la sanción.', 52, 11, 0, '2021-01-07', NULL, NULL, 0),
(54, 'FALTAS CALIFICADAS COMO GRAVÍSIMAS.', 'Se consideran gravísimas y se constituyen en causal de cancelación de la matrícula profesional, sin requerir la calificación que de ellas haga el Consejo respectivo, las siguientes faltas:<br><br>a) Derivar, de manera directa o por interpuesta persona, indebido o fraudulento provecho patrimonial en ejercicio de la profesión, con consecuencias graves para la parte afectada;<br><br>b) Obstaculizar, en forma grave, las investigaciones que realice el Consejo Profesional de Ingeniería respectivo;<br><br>c) El abandono injustificado de los encargos o compromisos profesionales, cuando con tal conducta causen grave detrimento al patrimonio económico del cliente o se afecte, de la misma forma, el patrimonio público;<br><br>d) La utilización fraudulenta de las hojas de vida de sus colegas para participar en concursos, licitaciones públicas, lo mismo que para suscribir los respectivos contratos;<br><br>e) Incurrir en algún delito que atente contra sus clientes, colegas o autoridades de la República, siempre y cuando la conducta punible comprenda el ejercicio de la ingeniería o de alguna de sus profesiones auxiliares;<br><br>f) Cualquier violación gravísima, según el criterio del Consejo respectivo, del régimen de deberes, obligaciones y prohibiciones que establecen el Código Ética y la presente ley.', 53, 11, 0, '2021-01-07', NULL, NULL, 0),
(55, 'CONCURSO DE FALTAS DISCIPLINARIAS.', 'El profesional que con una o varias acciones u omisiones infrinja varias disposiciones del Código de Ética Profesional o varias veces la misma disposición, quedará sometido a la que establezca la sanción más grave o, en su defecto, a una de mayor entidad.', 54, 11, 0, '2021-01-07', NULL, NULL, 0),
(56, 'CIRCUNSTANCIAS QUE JUSTIFICAN LA FALTA DISCIPLINARIA.', 'La conducta se justifica cuando se comete:<br><br>a) Por fuerza mayor o caso fortuito;<br><br>b) En estricto cumplimiento de un deber legal;<br><br>c) En cumplimiento de orden legítima de autoridad competente emitida con las formalidades legales.', 55, 11, 0, '2021-01-07', NULL, NULL, 0),
(57, 'ACCESO AL EXPEDIENTE.', 'El investigado tendrá acceso a la queja y demás partes del expediente disciplinario, solo a partir del momento en que sea escuchado en versión libre y espontánea o desde la notificación de cargos, según el caso.', 56, 11, 0, '2021-01-07', NULL, NULL, 0),
(58, 'PRINCIPIO DE IMPARCIALIDAD.', 'El Consejo Profesional de Ingeniería respectivo, directamente o a través de sus Consejos Seccionales o Regionales, deberá investigar y evaluar, tanto los hechos y circunstancias desfavorables, como los favorables a los intereses del disciplinado.', 57, 11, 0, '2021-01-07', NULL, NULL, 0),
(59, 'DIRECCIÓN DE LA FUNCIÓN DISCIPLINARIA.', 'Corresponde al Presidente del Consejo Profesional de Ingeniería respectivo, la dirección de la función disciplinaria, sin perjuicio del impedimento de intervenir o tener injerencia en la investigación, en razón de tener que conocer en segunda instancia por vía de apelación o de consulta.', 58, 11, 0, '2021-01-07', NULL, NULL, 0),
(60, 'PRINCIPIO DE PUBLICIDAD.', 'El Consejo Profesional de Ingeniería respectivo respetará y aplicará el principio de publicidad dentro de las investigaciones disciplinarias; no obstante, ni el quejoso, ni terceros interesados se constituirán en partes dentro de estas.', 59, 11, 0, '2021-01-07', NULL, NULL, 0),
(61, 'INICIACIÓN DEL PROCESO DISCIPLINARIO.', 'El proceso disciplinario de que trata el presente título se iniciará por queja interpuesta por cualquier persona natural o jurídica, la cual deberá formularse por escrito ante el Consejo Seccional o Regional del Consejo Profesional de Ingeniería respectivo, correspondiente a la jurisdicción territorial del lugar en que se haya cometido el último acto constitutivo de la falta o en defecto de este, ante el Consejo Seccional o Regional geográficamente más cercano.<br><br>PARÁGRAFO 1o. No obstante, en los casos de público conocimiento o hecho notorio y cuya gravedad lo amerite, a juicio de la Junta de Consejeros del Consejo Profesional Nacional respectivo, los Consejos Seccionales o Regionales deberán asumir la investigación disciplinaria de oficio.<br><br>PARÁGRAFO 2o. La Asesoría Jurídica del Consejo Profesional de Ingeniería respectivo u oficina que haga sus veces, resolverá todos los casos de conflictos de competencias, decisión de única instancia y en contra de la cual no procederá recurso alguno.', 60, 12, 0, '2021-01-07', NULL, NULL, 0),
(62, 'RATIFICACIÓN DE LA QUEJA.', 'Recibida la queja por el Consejo Seccional o Regional, a través de la Secretaría procederá a ordenarse la ratificación bajo juramento de la queja y mediante auto, ordenará la investigación preliminar, con el fin de establecer si hay o no mérito para abrir investigación formal disciplinaria contra el presunto o presuntos infractores.<br><br>Del auto a que se refiere el presente artículo se dará aviso escrito al Consejo Profesional Nacional correspondiente.<br><br>PARÁGRAFO. En todo caso que el quejoso sea renuente a rendir la ratificación juramentada y esta fuera absolutamente necesaria para poder continuar la investigación preliminar, por adolecer la queja de elementos suficientes para establecer alguna clase de indicio en contra del profesional o su debida identificación o individualización, la Secretaría Seccional respectiva ordenará sumariamente el archivo de la queja; actuación de la que rendirá informe a la Junta de Consejeros Seccionales y de la que dará aviso al Consejo Profesional Nacional.', 61, 12, 0, '2021-01-07', NULL, NULL, 0),
(63, 'TRASLADO DE COMPETENCIA.', 'Cuando existan razones para que se considere que se pueda entorpecer un proceso en determinado Consejo Seccional, el Consejo Nacional, podrá comisionar a otro Consejo Seccional, diferente del competente por jurisdicción territorial, el desarrollo del proceso disciplinario, para garantizar el cumplimento de todos los principios que lo rigen.', 62, 12, 0, '2021-01-07', NULL, NULL, 0),
(64, 'INVESTIGACIÓN PRELIMINAR.', 'La investigación preliminar será adelantada por la respectiva Secretaría Seccional y no podrá excederse de sesenta (60) días, contados a partir de la fecha del auto que ordena la apertura de la investigación preliminar, durante los cuales se decretarán y practicarán las pruebas que el investigador considere pertinentes y que conduzcan a la comprobación de los hechos; las cuales podrán ser, entre otras, testimoniales, documentales, periciales, etc.', 63, 12, 0, '2021-01-07', NULL, NULL, 0),
(65, 'FINES DE LA INDAGACIÓN PRELIMINAR.', 'La indagación preliminar tendrá como fines verificar la ocurrencia de la conducta, determinar si es constitutiva de falta disciplinaria e identificar o individualizar al profesional que presuntamente intervino en ella.<br><br>PARÁGRAFO. Para el cumplimiento de los fines de la indagación preliminar, el funcionario competente hará uso de los medios de prueba legalmente reconocidos y podrá oír en versión libre y espontánea al profesional que considere necesario para determinar la individualización o identificación de los intervinientes en el hecho investigado.', 64, 12, 0, '2021-01-07', NULL, NULL, 0),
(66, 'INFORME Y CALIFICACIÓN DEL MÉRITO DE LA INVESTIGACIÓN PRELIMINAR.', 'Terminada la etapa de investigación preliminar, la Secretaría Seccional o Regional procederá dentro de los diez (10) días hábiles siguientes, a rendir un informe al Presidente Seccional, para que este, dentro de los quince (15) días hábiles siguientes a su recibo, califique lo actuado mediante auto motivado, en el que se determinará si hay o no mérito para adelantar investigación formal disciplinaria contra el profesional disciplinado y en caso afirmativo, se le formulará con el mismo auto, el correspondiente pliego de cargos. Si no se encontrare mérito para seguir la actuación, el Presidente Seccional ordenará en la misma providencia el archivo del expediente, informando sucintamente la determinación a la Junta de Consejeros Seccional o Regional en la siguiente sesión ordinaria, para que quede consignado en el acta respectiva, comunicando la decisión adoptada al quejoso, a los profesionales involucrados y al Consejo Profesional Nacional respectivo.', 65, 12, 0, '2021-01-07', NULL, NULL, 0),
(67, 'NOTIFICACIÓN PLIEGO DE CARGOS.', 'La Secretaría Regional o Seccional, notificará personalmente el pliego de cargos al profesional inculpado. No obstante, de no poder efectuarse la notificación personal, se hará por edicto en los términos establecidos en el Código Contencioso Administrativo. Si transcurrido el término de la notificación por edicto, el inculpado no compareciere, se proveerá el nombramiento de un apoderado de oficio, de la lista de abogados inscritos ante el Consejo Seccional de la Judicatura correspondiente, con quien se continuará la actuación; designación que conllevará al abogado, las implicaciones y responsabilidades que la ley determina.', 66, 12, 0, '2021-01-07', NULL, NULL, 0),
(68, 'TRASLADO DEL PLIEGO DE CARGOS.', 'Surtida la notificación, se dará traslado al profesional inculpado por el término improrrogable de diez (10) días hábiles, para presentar descargos, solicitar y aportar pruebas. Para tal efecto, el expediente permanecerá a su disposición en la Secretaría de la Seccional o Regional respectiva.', 67, 12, 0, '2021-01-07', NULL, NULL, 0),
(69, 'ETAPA PROBATORIA.', 'Vencido el término de traslado, la Secretaría Seccional, decretará las pruebas solicitadas por el investigado y las demás que de oficio considere conducentes y pertinentes, mediante auto contra el cual no procede recurso alguno y el cual deberá ser comunicado al profesional disciplinado. El término probatorio será de sesenta (60) días.', 68, 12, 0, '2021-01-07', NULL, NULL, 0),
(70, 'FALLO DE PRIMERA INSTANCIA.', 'Vencido el término probatorio previsto, el Presidente Regional o Seccional, elaborará un proyecto de decisión, que se someterá a la consideración de la Junta de Consejeros Regionales o Seccionales, la cual podrá aceptarlo, aclararlo, modificarlo o revocarlo. Si la mayoría de los miembros asistentes a la sesión aprueban el proyecto de decisión, se adoptará la decisión propuesta mediante resolución motivada.<br><br>PARÁGRAFO. Los salvamentos de voto respecto del fallo final, si los hay, deberán constar en el acta de la reunión respectiva.', 69, 12, 0, '2021-01-07', NULL, NULL, 0),
(71, 'NOTIFICACIÓN DEL FALLO.', 'La decisión adoptada por el Consejo Profesional Seccional, se notificará personalmente al interesado, por intermedio de la Secretaría Seccional, dentro de los diez (10) días siguientes a la fecha de la sesión en que se adoptó y si no fuere posible, se realizará por edicto, en los términos del artículo 45 del Código Contencioso Administrativo.', 70, 12, 0, '2021-01-07', NULL, NULL, 0),
(72, 'RECURSO DE APELACIÓN.', 'Contra dicha providencia solo procede el recurso de apelación ante el Consejo Profesional Nacional de Ingeniería respectivo, dentro de los cinco (5) días siguientes a la fecha de la notificación personal o de la desfijación del edicto recurso que deberá presentarse ante el Consejo Regional o Seccional por escrito y con el lleno de los requisitos que exige el Código Contencioso Administrativo.', 71, 12, 0, '2021-01-07', NULL, NULL, 0),
(73, 'AGOTAMIENTO DE LA VÍA GUBERNATIVA.', 'El Consejo Profesional Nacional resolverá el recurso interpuesto, mediante resolución motivada; determinación que será definitiva y contra la cual no procederá recurso alguno por vía gubernativa.', 72, 12, 0, '2021-01-07', NULL, NULL, 0),
(74, 'CONFIRMACIÓN.', 'En todo caso, el acto administrativo mediante el cual se dé por terminada la actuación de un Consejo Seccional dentro de un proceso disciplinario, deberá ser confirmado, modificado o revocado, según el caso, por el Consejo Profesional Nacional de Ingeniería correspondiente, por vía de apelación o de consulta.', 73, 12, 0, '2021-01-07', NULL, NULL, 0),
(75, 'CÓMPUTO DE LA SANCIÓN.', 'Las sanciones impuestas por violaciones al presente régimen disciplinario, empezarán a computarse a partir de la fecha de la comunicación personal o de la entrega por correo certificado, que se haga al profesional sancionado de la decisión del Consejo Profesional Nacional correspondiente, sobre la apelación o la consulta.', 74, 12, 0, '2021-01-07', NULL, NULL, 0),
(76, 'AVISO DE LA SANCIÓN.', 'De toda sanción disciplinaria impuesta a un profesional, a través de la Secretaría del Consejo Seccional respectivo, se dará aviso a la Procuraduría General de la Nación, a todas las entidades que tengan que ver con el ejercicio profesional correspondiente, con el registro de proponentes y contratistas y a las agremiaciones de profesionales, con el fin de que se impida el ejercicio de la profesión por parte del sancionado, debiendo estas, ordenar las anotaciones en sus registros y tomar las medidas pertinentes, con el fin de hacer efectiva la sanción. La anotación tendrá vigencia y solo surtirá efectos por el término de la misma.', 75, 12, 0, '2021-01-07', NULL, NULL, 0),
(77, 'CADUCIDAD DE LA ACCIÓN.', 'La acción disciplinaria a que se refiere el presente título caduca en cinco (5) años contados a partir de la fecha en que se cometió el último acto constitutivo de la falta. El auto que ordena la apertura de la investigación preliminar, interrumpe el término de caducidad. El proceso prescribirá tres años después de la fecha de expedición de dicho auto.', 76, 12, 0, '2021-01-07', NULL, NULL, 0),
(78, 'RÉGIMEN TRANSITORIO.', 'Todas las actuaciones que se adelanten por parte de los Consejos Profesionales de Ingeniería y sus respectivos Consejos Seccionales o Regionales, de acuerdo con los procedimientos vigentes en el momento en que comience a regir la presente ley, seguirán rigiéndose por estos hasta su culminación.', 77, 12, 0, '2021-01-07', NULL, NULL, 0),
(79, 'VIGENCIA.', 'La presente ley rige a partir de la fecha de su publicación en el Diario Oficial y deroga todas las disposiciones que le sean contrarias, en especial la Ley 20 de 1971, la Ley 14 de 1975, la Ley 64 de 1978, la Ley 28 de 1989, la Ley 33 de 1989, Ley 392 de 1997 y sus normas reglamentarias.<br><br>Nota: Sentencia C-570 de 2004, Corte Constitucional. Artículo CONDICIONALMENTE EXEQUIBLE &#34... en el entendido de que la derogación de normas que allí se ordena no comprende las relacionadas con la creación y asignación de funciones a los consejos profesionales existentes para especialidades de la ingeniería y las profesiones afines y auxiliares de esa disciplina&#34.<br><br>Auto 226 de 2003, Corte Constitucional. La Corte Constitucional dispuso: En consecuencia, los Artículos 26, 27 y 28 de la Ley 435 de 1998, están vigentes y aplican con todos sus efectos para el COPNIA.<br><br><strike>PARÁGRAFO. Las funciones asignadas por leyes anteriores a Consejos Profesionales de Ingeniería y profesiones afines y auxiliares que a la fecha de la entrada en vigencia de la presente ley, no se hayan instalado o no estén funcionando, pasarán al Consejo Profesional de Ingeniería, Copnia</strike><br><br>Nota: Sentencia C-570 de 2004. Parágrafo declarado INEXEQUIBLE<br><br>Notas Especiales para la totalidad de la Ley 842 de 2003:<br><br>Mediante la Sentencia C-078 de 2003, la Corte Constitucional revisó las objeciones presidenciales a los artículos25, 26, 27, 28 y 80 delproyecto de Ley No. 44 de 2001 del Senado de la República,218 de 2002 de la Cámara de Representantes, en cumplimiento de lo dispuesto en el artículo 167 de la Constitución Política.<br><br>Los artículos 25, 26, 27, 28 y 80 del Proyecto de Ley, son actualmente los artículos 24, 25, 26, 27 y 78 de la Ley 842 de 2003.<br><br>Sentencia C-649 de 2003, Corte Constitucional. Se declaró cumplida la exigencia constitucional del artículo 167 de la Carta Política.', 77, 13, 0, '2021-01-07', NULL, NULL, 0),
(80, 'Articulo Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quam odio, mollis id ante id, feugiat fermentum purus. Aenean porta urna nec tincidunt pellentesque. Mauris dapibus lectus mollis lorem tempus scelerisque in quis diam. Ut ornare quam eget ante facilisis, at luctus urna lacinia. Pellentesque tortor felis, ultricies ut ante aliquet, pellentesque tristique est. Sed ultrices nibh non massa pharetra ullamcorper. Fusce tincidunt commodo lobortis.\r\n\r\nMaecenas commodo purus sed luctus commodo. Integer lacinia pretium iaculis. Morbi sed mauris purus. Vivamus scelerisque tristique libero vitae varius. Suspendisse vehicula erat id lacus blandit dignissim. Ut in egestas purus. Sed ex felis, pulvinar et elementum lacinia, ornare porttitor velit. Nullam in semper nibh. Maecenas turpis erat, pharetra in vestibulum sed, consectetur at ligula. Quisque ligula ex, consectetur quis risus at, sodales laoreet dolor. Vestibulum id eros eget justo porttitor pellentesque. Integer dictum et nulla finibus sagittis. Donec fermentum ligula turpis, et placerat enim vestibulum sit amet. Nullam quis dignissim tortor.', 80, 15, 0, '2021-02-05', '2021-02-05 05:52:14', '2021-02-05 05:52:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `capitulos`
--

CREATE TABLE `capitulos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `id_titulo` int(5) NOT NULL,
  `vistas` int(11) NOT NULL DEFAULT '0',
  `fecha_modificacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `capitulos`
--

INSERT INTO `capitulos` (`id`, `nombre`, `numero`, `id_titulo`, `vistas`, `fecha_modificacion`, `created_at`, `updated_at`) VALUES
(2, 'DEFINICIÓN Y ALCANCES.', 1, 1, 0, '2021-01-07', NULL, NULL),
(3, 'REQUISITOS PARA EJERCER LA INGENIERÍA, SUS PROFESIONES AFINES Y SUS PROFESIONES AUXILIARES.', 1, 3, 0, '2021-01-07', NULL, NULL),
(4, 'DEL EJERCICIO ILEGAL DE LA INGENIERÍA Y DE SUS PROFESIONES AFINES Y AUXILIARES.', 2, 3, 0, '2021-01-07', NULL, NULL),
(5, 'DE LOS PROFESIONALES EXTRANJEROS.', 3, 3, 0, '2021-01-07', NULL, NULL),
(6, 'DENOMINACIÓN, NATURALEZA JURÍDICA, INTEGRACIÓN Y FUNCIONES.', 1, 4, 0, '2021-01-07', NULL, NULL),
(7, 'DE LOS CONSEJOS REGIONALES O SECCIONALES.', 2, 4, 0, '2021-01-07', NULL, NULL),
(8, 'DISPOSICIONES GENERALES.', 1, 5, 0, '2021-01-07', NULL, NULL),
(9, 'DE LOS DEBERES Y OBLIGACIONES DE LOS PROFESIONALES.', 2, 5, 0, '2021-01-07', NULL, NULL),
(10, 'DE LAS INHABILIDADES E INCOMPATIBILIDADES DE LOS PROFESIONALES EN EL EJERCICIO DE LA PROFESIÓN.', 3, 5, 0, '2021-01-07', NULL, NULL),
(11, 'DEFINICIÓN, PRINCIPIOS Y SANCIONES.', 1, 7, 0, '2021-01-07', NULL, NULL),
(12, 'PROCEDIMIENTO DISCIPLINARIO.', 2, 7, 0, '2021-01-07', NULL, NULL),
(13, ' ', 0, 8, 0, '2021-01-07', NULL, NULL),
(14, 'Test capitulo', 1, 9, 0, '2021-02-05', '2021-02-05 05:47:03', '2021-02-05 05:47:03'),
(15, 'Test capitulo', 2, 9, 0, '2021-02-05', '2021-02-05 05:49:21', '2021-02-05 05:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `edicion_articulos`
--

CREATE TABLE `edicion_articulos` (
  `id` int(11) NOT NULL,
  `id_administrador` int(5) NOT NULL,
  `id_articulo` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` char(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edicion_articulos`
--

INSERT INTO `edicion_articulos` (`id`, `id_administrador`, `id_articulo`, `fecha`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 200, 80, '2021-02-05', 'ADC', '2021-02-05 05:52:14', '2021-02-05 05:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `edicion_capitulos`
--

CREATE TABLE `edicion_capitulos` (
  `id` int(11) NOT NULL,
  `id_administrador` int(5) NOT NULL,
  `id_capitulo` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` char(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edicion_capitulos`
--

INSERT INTO `edicion_capitulos` (`id`, `id_administrador`, `id_capitulo`, `fecha`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 200, 15, '2021-02-05', 'ADC', '2021-02-05 05:49:21', '2021-02-05 05:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `edicion_titulos`
--

CREATE TABLE `edicion_titulos` (
  `id` int(11) NOT NULL,
  `id_administrador` int(5) NOT NULL,
  `id_titulo` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` char(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edicion_titulos`
--

INSERT INTO `edicion_titulos` (`id`, `id_administrador`, `id_titulo`, `fecha`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 200, 9, '2021-02-05', 'ADC', '2021-02-05 05:45:21', '2021-02-05 05:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id` int(11) NOT NULL,
  `visitas_pagina` int(11) NOT NULL,
  `numero_modificaciones` int(11) NOT NULL,
  `numero_adiciones` int(11) NOT NULL,
  `numero_supreciones` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estadisticas`
--

INSERT INTO `estadisticas` (`id`, `visitas_pagina`, `numero_modificaciones`, `numero_adiciones`, `numero_supreciones`, `created_at`, `updated_at`) VALUES
(2021, 4, 0, 3, 0, '2021-01-12 06:00:13', '2021-02-05 05:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipos`
--

CREATE TABLE `tipos` (
  `id` char(3) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipos`
--

INSERT INTO `tipos` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
('ADC', 'Adición', NULL, NULL),
('MOD', 'Edición ', NULL, NULL),
('SUP', 'Eliminación', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `titulos`
--

CREATE TABLE `titulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `vistas` int(11) NOT NULL DEFAULT '0',
  `fecha_modificacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titulos`
--

INSERT INTO `titulos` (`id`, `nombre`, `numero`, `vistas`, `fecha_modificacion`, `created_at`, `updated_at`) VALUES
(1, 'GENERALIDADES.', 1, 0, '2021-01-07', NULL, NULL),
(3, 'EJERCICIO DE LA INGENIERIA, DE SUS PROFESIONES AFINES Y DE SUS PROFESIONES AUXILIARES.', 2, 0, '2021-01-07', NULL, NULL),
(4, 'DEL CONSEJO PROFESIONAL NACIONAL DE INGENIERIA Y SUS CORRESPONDIENTES REGIONALES O SECCIONALES.', 3, 0, '2021-01-07', NULL, NULL),
(5, 'CODIGO DE ÉTICA PARA EL EJERCICIO DE LA INGENIERIA EN GENERAL Y SUS PROFESIONES AFINES Y AUXILIARES.', 4, 0, '2021-01-07', NULL, NULL),
(7, 'REGIMEN DISCIPLINARIO.', 5, 0, '2021-01-07', NULL, NULL),
(8, 'DISPOSICIONES FINALES.', 6, 0, '2021-01-07', NULL, NULL),
(9, 'Titulo Test', 7, 0, '2021-02-05', '2021-02-05 05:45:21', '2021-02-05 05:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitas_diarias`
--

CREATE TABLE `visitas_diarias` (
  `id` int(11) NOT NULL,
  `contador` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitas_diarias`
--

INSERT INTO `visitas_diarias` (`id`, `contador`, `created_at`, `updated_at`, `fecha`) VALUES
(2, 2, '2021-01-12 11:03:07', '2021-01-12 11:14:43', '2021-12-01'),
(3, 1, '2021-02-05 04:52:42', '2021-02-05 04:52:42', '2021-04-02'),
(4, 1, '2021-02-05 05:24:48', '2021-02-05 05:24:48', '2021-05-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indexes for table `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_capitulo_fk` (`id_capitulo`);

--
-- Indexes for table `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_titulo_fk` (`id_titulo`);

--
-- Indexes for table `edicion_articulos`
--
ALTER TABLE `edicion_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_articulom_fk` (`id_articulo`),
  ADD KEY `id_adminm_fk` (`id_administrador`);

--
-- Indexes for table `edicion_capitulos`
--
ALTER TABLE `edicion_capitulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_adminc_fk` (`id_administrador`),
  ADD KEY `id_capitulom_fk` (`id_capitulo`);

--
-- Indexes for table `edicion_titulos`
--
ALTER TABLE `edicion_titulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admint_fk` (`id_administrador`),
  ADD KEY `id_titulom_fk` (`id_titulo`);

--
-- Indexes for table `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitas_diarias`
--
ALTER TABLE `visitas_diarias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dia` (`fecha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `edicion_articulos`
--
ALTER TABLE `edicion_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `edicion_capitulos`
--
ALTER TABLE `edicion_capitulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `edicion_titulos`
--
ALTER TABLE `edicion_titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `visitas_diarias`
--
ALTER TABLE `visitas_diarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `id_capitulo_fk` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulos` (`id`);

--
-- Constraints for table `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `id_titulo_fk` FOREIGN KEY (`id_titulo`) REFERENCES `titulos` (`id`);

--
-- Constraints for table `edicion_articulos`
--
ALTER TABLE `edicion_articulos`
  ADD CONSTRAINT `id_adminm_fk` FOREIGN KEY (`id_administrador`) REFERENCES `administradores` (`id`),
  ADD CONSTRAINT `id_articulom_fk` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`);

--
-- Constraints for table `edicion_capitulos`
--
ALTER TABLE `edicion_capitulos`
  ADD CONSTRAINT `id_adminc_fk` FOREIGN KEY (`id_administrador`) REFERENCES `administradores` (`id`),
  ADD CONSTRAINT `id_capitulom_fk` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulos` (`id`);

--
-- Constraints for table `edicion_titulos`
--
ALTER TABLE `edicion_titulos`
  ADD CONSTRAINT `id_admint_fk` FOREIGN KEY (`id_administrador`) REFERENCES `administradores` (`id`),
  ADD CONSTRAINT `id_titulom_fk` FOREIGN KEY (`id_titulo`) REFERENCES `titulos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
