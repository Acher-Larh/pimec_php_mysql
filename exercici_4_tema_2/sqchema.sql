DROP TABLE IF EXISTS Imparticion;
DROP TABLE IF EXISTS Matricula;
DROP TABLE IF EXISTS Profesores;
DROP TABLE IF EXISTS Alumnos;
DROP TABLE IF EXISTS Usuarios;
DROP TABLE IF EXISTS Cursos;
DROP TABLE IF EXISTS Role;
DROP TABLE IF EXISTS Estado;

CREATE TABLE Role (
    id_role INT NOT NULL AUTO_INCREMENT,
    role TEXT NOT NULL,
    PRIMARY KEY (id_role)
);

CREATE TABLE Estado (
    id_estado INT NOT NULL AUTO_INCREMENT,
    estado TEXT NOT NULL,
    PRIMARY KEY (id_estado)
);

CREATE TABLE Usuarios (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    id_role INT NOT NULL,
    nombre TEXT NOT NULL,
    apellido_primero TEXT NOT NULL,
    apellido_segundo TEXT DEFAULT NULL,
    email NVARCHAR(255) NOT NULL,
    user_name TEXT NOT NULL,
    password varchar(100),
    cookie VARCHAR(100),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_cookie DATE DEFAULT NULL,
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_role) REFERENCES Role(id_role)
) ENGINE=InnoDB;


CREATE TABLE Cursos (
    id_curso INT NOT NULL AUTO_INCREMENT,
    curso TEXT NOT NULL,
    cuerpo TEXT NOT NULL,
    id_profesor INT NOT NULL,
    id_estado INT NOT NULL,
    PRIMARY KEY (id_curso),
    FOREIGN KEY (id_estado) REFERENCES Estado(id_estado)
) ENGINE=InnoDB;



CREATE TABLE Profesores (
    id_profesor INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL, 
    id_curso INT NOT NULL, 
    PRIMARY KEY (id_profesor),
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
) ENGINE=InnoDB;


CREATE TABLE Alumnos (
    id_alumno INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL, 
    id_curso INT NOT NULL, 
    PRIMARY KEY (id_alumno),
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso),
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
) ENGINE=InnoDB;


CREATE TABLE Imparticion (
    id_imparticion INT NOT NULL AUTO_INCREMENT,
    id_curso INT NOT NULL,
    id_profesor INT NOT NULL,
    PRIMARY KEY (id_imparticion),
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso),
    FOREIGN KEY (id_profesor) REFERENCES Profesores(id_profesor)
) ENGINE=InnoDB;


CREATE TABLE Matricula (
    id_matricula INT NOT NULL AUTO_INCREMENT,
    id_curso INT NOT NULL,
    id_alumno INT NOT NULL,
    PRIMARY KEY (id_matricua),
    FOREIGN KEY (id_curso) REFERENCES Cursos(id_curso),
    FOREIGN KEY (id_alumno) REFERENCES Alumnos(id_alumno)
) ENGINE=InnoDB;

-- CONSTANT VALUES
INSERT INTO Role (id_role, role) VALUES (NULL, "Alumne");
INSERT INTO Role (id_role, role) VALUES (NULL, "Professor");
INSERT INTO Role (id_role, role) VALUES (NULL, "Administrador");

INSERT INTO Estado (id_estado, estado) VALUES (NULL, "Oberta");
INSERT INTO Estado (id_estado, estado) VALUES (NULL, "Tancada");
INSERT INTO Estado (id_estado, estado) VALUES (NULL, "Limbo");

-- VARIABLE VALUES

INSERT INTO Usuarios (id_usuario, id_role, nombre, apellido_primero, apellido_segundo, email, user_name, password, cookie, fecha_registro, fecha_cookie) VALUES (NULL, 3, "Administrador", "Sanchez", "Darwin", "admin@development.localhost", "admin", "rootp@ssw0rd123", NULL, NULL, NULL);

INSERT INTO Usuarios (id_usuario, id_role, nombre, apellido_primero, apellido_segundo, email, user_name, password, cookie, fecha_registro, fecha_cookie) VALUES (NULL, 2, "Professor", "Moran", "Darwin", "teacher@development.localhost", "professor", "teacherP@ssw0rd123", NULL, NULL, NULL);

INSERT INTO Usuarios (id_usuario, id_role, nombre, apellido_primero, apellido_segundo, email, user_name, password, cookie, fecha_registro, fecha_cookie) VALUES (NULL, 1, "Alumne", "Gabriel", "Darwin", "student@development.localhost", "alumne", "studentP@ssw0rd123", NULL, NULL, NULL);


INSERT INTO Professor (id_profesor, id_usuario, id_curso) VALUES (NULL, 2, 1)

INSERT INTO Alumne (id_alumno, id_usuario, id_curso) VALUES (NULL, 3, 1)


INSERT INTO Cursos (id_curso, curso, cuerpo, id_profesor, id_estado) VALUES (NULL, "Full Stack Web Development", "Aprende a desarollar aplicaciones web de servidor a cliente", 1, 1);

INSERT INTO Cursos (id_curso, curso, cuerpo, id_profesor, id_estado) VALUES (NULL, "Full Stack Web Development", "Aprende a desarollar aplicaciones web de servidor a cliente", 1, 1);


INSERT INTO Matricula (id_matricula, id_curso, id_alumno) VALUES (NULL, 1, 1);

INSERT INTO Imparticion (id_imparticion, id_curso, id_profesor) VALUES (NULL, 2, 1);

