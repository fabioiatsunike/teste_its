--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf_cnpj` varchar(20) NOT NULL,
  `empresa` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `data_nasc` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `cep` varchar(12) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `cnpj` varchar(20) NOT NULL,
  `razao` varchar(60) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `cliente` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cnpj`);
COMMIT;

