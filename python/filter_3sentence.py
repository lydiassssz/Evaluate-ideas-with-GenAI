import pandas as pd
import ast


def filter(dict_data):
  try:
    problem = dict_data['problem']
    solution = dict_data['solution']
    problem_sentence = problem.split('.')
    solution_sentence = solution.split('.')
    problem_sentences = [sentence.strip() for sentence in problem_sentence if sentence.strip()]
    solution_sentences = [sentence.strip() for sentence in solution_sentence if sentence.strip()]
    problem_length = len(problem_sentences)
    solution_length = len(solution_sentences)
    if problem_length >= 3 and solution_length >= 3:
      filter_flg = 1
    else:
      filter_flg = 0

    print(filter_flg)

  except (ValueError, SyntaxError) as e:
      print(f"Error: {e}")


if __name__ == "__main__":
  args = sys.argv
  dict_data = args[1]
  # 文字列を辞書に変換
  input_dict = ast.literal_eval(dict_data)
  filter(input_dict)
