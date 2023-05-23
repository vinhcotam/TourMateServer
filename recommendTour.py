from flask import Flask, request, jsonify
import pandas as pd
import numpy as np
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import requests
app = Flask(__name__)

@app.route('/recommend', methods=['GET'])
def recommend():
    url = request.args.get('url')
    print(url)
    response = requests.get(url)

    if response.status_code == 200:
        data = response.json()
        namee = (data[0]['received_name'])

        tours_df = pd.DataFrame.from_dict(data)
        tours_df['name'] = tours_df['name'].fillna('')
        #tours_df['text'] = tours_df[['latitude', 'longtitude']].apply(lambda x: str(x[0]) + ' ' + str(x[1]), axis=1)
        tours_df['text'] = tours_df['location'] + ' ' + tours_df['latitude'] + ' ' + tours_df['longtitude']
        tfv = TfidfVectorizer(min_df=3, max_features=None,
                              strip_accents='unicode', analyzer='word', token_pattern=r'\w{1,}',
                              ngram_range=(1, 3), stop_words='english')
        #tfv_matrix = tfv.fit_transform(tours_df['location'])
        tfv_matrix = tfv.fit_transform(tours_df['text'])
        cosine_sim = cosine_similarity(tfv_matrix, tfv_matrix)
        indices = pd.Series(tours_df.index, index=tours_df['name']).drop_duplicates()

        def give_reg(title, cosine_sim=cosine_sim, indices=indices):
            idx = indices[title]
            sim_scores = cosine_sim[idx]
            sim_indices = np.argsort(-sim_scores)
            tour_indices = sim_indices[1:6]
            return tours_df['name'].iloc[tour_indices].tolist()

        result = give_reg(namee)
        json_result = jsonify(result)
        return json_result, 200

    else:
        return "Failed to get data from API.", 400

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001)
