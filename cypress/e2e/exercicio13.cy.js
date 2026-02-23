describe ('Exercício 13 - Classificação de Temperatura', () => {
    beforeEach(() => { 
        cy.visit('/exercicio13/');
    });

    it('Exibir o título da página, input e botão submit', () => {
        cy.contains('Controle de Temperaturas').should('be.visible');
        cy.get('input[type="text"]').should('be.visible');
        cy.get('button[id="enviar"]').should('be.visible');
        cy.contains('(Digite 999 para finalizar)').should('be.visible');
        cy.contains('Fria: abaixo de 15°C').should('be.visible');
        cy.contains('Agradável: 15°C até 30°C').should('be.visible');
        cy.contains('Quente: acima de 30°C').should('be.visible');
    });

    it('Classificar temperaturas corretamente', () => {
        const temperaturas = [10, 20, 35, 999];
        const classificacoes = ['Fria', 'Agradável', 'Quente'];
        temperaturas.forEach((temp, index) => {
            cy.get('input[type="text"]').clear().type(temp);
            cy.get('button[id="enviar"]').click();
            if (temp !== 999) {
                cy.contains(classificacoes[index]).should('be.visible');
            } else {
                cy.contains('Resultado').should('be.visible');
            }
        });
    });

    it('Finalizar o programa ao digitar 999', () => {
        cy.get('input[type="text"]').clear().type(999);
        cy.get('button[id="enviar"]').click();
        cy.contains('Resultados').should('be.visible');
    });
});