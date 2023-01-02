const satori = require('satori').default;
const fs = require('fs');
const parse = require('html-react-parser');

(async () => {
    const arguments = process.argv.slice(2);

    const htmlFilePath = arguments[0];
    const width = arguments[1];
    const height = arguments[2];

    const html = fs.readFileSync(htmlFilePath, { encoding:'utf8', flag:'r' });

    const svg = await satori(
        parse(html),
        {
            width,
            height,
            fonts: [
                {
                    name: 'Noto+Sans',
                    data: fs.readFileSync(`${__dirname}/../fonts/NotoSans/NotoSans-Regular.ttf`),
                    weight: 400,
                    style: 'regular',
                },
            ],
        },
    );

    process.stdout.write(svg);
})();
