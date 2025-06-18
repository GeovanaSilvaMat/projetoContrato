
USE contratoforn;

INSERT INTO faturamento (id, prazo, vencimento) VALUES
(1, '15 dias', 10),
(2, '30 dias', 20),
(3, '45 dias', 30),
(4, '60 dias', 40),
(5, '75 dias', 50);

INSERT INTO representante (id, nome, nacionalidade, logradouro, cidade, estado, email) VALUES
(1, 'Representante 1', 'Brasileiro', 'Rua 1', 'Cidade X', 'SP', 'rep1@email.com'),
(2, 'Representante 2', 'Brasileiro', 'Rua 2', 'Cidade X', 'SP', 'rep2@email.com'),
(3, 'Representante 3', 'Brasileiro', 'Rua 3', 'Cidade X', 'SP', 'rep3@email.com'),
(4, 'Representante 4', 'Brasileiro', 'Rua 4', 'Cidade X', 'SP', 'rep4@email.com'),
(5, 'Representante 5', 'Brasileiro', 'Rua 5', 'Cidade X', 'SP', 'rep5@email.com');

INSERT INTO contratada (id, cnpj, razaosocial, logradouro, cidade, estado, email, representante_id) VALUES
(1, '00000000000100', 'Empresa 1 LTDA', 'Av. Empresa 1', 'Cidade Y', 'RJ', 'empresa1@email.com', 1),
(2, '00000000000200', 'Empresa 2 LTDA', 'Av. Empresa 2', 'Cidade Y', 'RJ', 'empresa2@email.com', 2),
(3, '00000000000300', 'Empresa 3 LTDA', 'Av. Empresa 3', 'Cidade Y', 'RJ', 'empresa3@email.com', 3),
(4, '00000000000400', 'Empresa 4 LTDA', 'Av. Empresa 4', 'Cidade Y', 'RJ', 'empresa4@email.com', 4),
(5, '00000000000500', 'Empresa 5 LTDA', 'Av. Empresa 5', 'Cidade Y', 'RJ', 'empresa5@email.com', 5);

INSERT INTO contrato (id, titulo, data, faturamento_id) VALUES
(1, 'Contrato 1', '2025-06-17', 1),
(2, 'Contrato 2', '2025-05-18', 2),
(3, 'Contrato 3', '2025-04-18', 3),
(4, 'Contrato 4', '2025-03-19', 4),
(5, 'Contrato 5', '2025-02-17', 5);

INSERT INTO contratante (id, cnpj, razaosocial, logradouro, cidade, estado, email, contrato_id, faturamento_id, representante_id) VALUES
(1, '11111111111111', 'Cliente 1 SA', 'Rua Cliente 1', 'Cidade Z', 'MG', 'cliente1@email.com', 1, 1, 1),
(2, '11111111111211', 'Cliente 2 SA', 'Rua Cliente 2', 'Cidade Z', 'MG', 'cliente2@email.com', 2, 2, 2),
(3, '11111111111311', 'Cliente 3 SA', 'Rua Cliente 3', 'Cidade Z', 'MG', 'cliente3@email.com', 3, 3, 3),
(4, '11111111111411', 'Cliente 4 SA', 'Rua Cliente 4', 'Cidade Z', 'MG', 'cliente4@email.com', 4, 4, 4),
(5, '11111111111511', 'Cliente 5 SA', 'Rua Cliente 5', 'Cidade Z', 'MG', 'cliente5@email.com', 5, 5, 5);

INSERT INTO representante_has_contrato (representante_id, contrato_id) VALUES
(1, 3),
(2, 4),
(3, 5),
(4, 1),
(5, 2);
