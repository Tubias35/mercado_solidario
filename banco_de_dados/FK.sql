/*Elaborando as FK*/
/*cartão*/
ALTER TABLE cartao ADD CONSTRAINT FK_CARTAO_USUARIO FOREIGN KEY(id_usuario) REFERENCES
Usuario(idUsuario);
/*endereco*/
ALTER TABLE endereco ADD CONSTRAINT FK_ENDERECO_USUARIO FOREIGN KEY(id_usuario) REFERENCES
Usuario(idUsuario);
ALTER TABLE endereco ADD CONSTRAINT FK_ENDERECO_INSTITUICOES FOREIGN KEY(id_instituicao) REFERENCES
intstuicoes(idInst);
/*telefone*/
ALTER TABLE telefone ADD CONSTRAINT FK_TELEFONE_USUARIO FOREIGN KEY(id_usuario) REFERENCES
Usuario(idUsuario);
ALTER TABLE telefone ADD CONSTRAINT FK_TELEFONE_INSTITUICOES FOREIGN KEY(id_instituicao) REFERENCES
intstuicoes(idInst);
/*conta*/
ALTER TABLE conta ADD CONSTRAINT FK_CONTA_INSTITUICOES FOREIGN KEY(id_instituicao) REFERENCES
intstuicoes(idInst);
/*tipo*/
ALTER TABLE tipo ADD CONSTRAINT FK_TIPO_CATEGORIA FOREIGN KEY(id_categoria) REFERENCES
categoria(idCategoria);
/*produto*/
ALTER TABLE produto ADD CONSTRAINT FK_PRODUTO_VENDEDOR FOREIGN KEY(id_vendedor) REFERENCES
Usuario(idUsuario);
ALTER TABLE produto ADD CONSTRAINT FK_PRODUTO_CATEGORIA FOREIGN KEY(id_categoria) REFERENCES
categoria(idCategoria);
ALTER TABLE produto ADD CONSTRAINT FK_PROFUTO_TIPO FOREIGN KEY(id_tipo) REFERENCES
tipo(idTipo);
/*foto_pdt*/
ALTER TABLE foto_pdt ADD CONSTRAINT FK_FOTOPDT_PRODUTO FOREIGN KEY(id_produto) REFERENCES
produto(idProduto);
/*compra*/
ALTER TABLE compra ADD CONSTRAINT FK_COMPRA_PRODUTO FOREIGN KEY(id_produto) REFERENCES
produto(idProduto);
ALTER TABLE compra ADD CONSTRAINT FK_COMPRA_VENDEDOR FOREIGN KEY(id_vendedor) REFERENCES
Usuario(idUsuario);
ALTER TABLE compra ADD CONSTRAINT FK_COMPRA_COMPRADOR FOREIGN KEY(id_comprador) REFERENCES
Usuario(idUsuario);
ALTER TABLE compra ADD CONSTRAINT FK_COMPRA_INSTITUICAO FOREIGN KEY(id_instituicao) REFERENCES
intstuicoes(idInst);
ALTER TABLE compra ADD CONSTRAINT FK_COMPRA_ENDERECO FOREIGN KEY(id_endereco) REFERENCES
endereco(idEndereco);
ALTER TABLE compra ADD CONSTRAINT FK_COMPRA_CARTAO FOREIGN KEY(id_cartao) REFERENCES
cartao(idCartao);





