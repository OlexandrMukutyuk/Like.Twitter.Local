module.exports = {
    entry: './src/main.js', // Перевірте шлях до вашого головного файлу

    module: {
        rules: [
            {
                test: require.resolve('jquery'),
                use: [
                    {
                        loader: 'expose-loader',
                        options: {
                            exposes: '$'
                        }
                    }
                ]
            }
        ]
    }
};
